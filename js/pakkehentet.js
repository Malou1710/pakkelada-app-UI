export default class Pakkehentet{
    constructor() {
        this.data = {
            password: 4700
        }

        this.rootElem = document.querySelector('.pakkehentet')
        this.itemstre = this.rootElem.querySelector('.itemstre');
    }

    async init(){
        await this.render();
    }

    async render(){
        const data = await this.getData();

        const row = document.createElement('div');
        row.classList.add('row');

        for(const itemstre of data){
            const col = document.createElement('div');
            col.classList.add('col-12');

            col.innerHTML= `
                <div class="container-fluid">         
                     <div class="row">
                        <a  href="pakkeoversigt3.php?pakkeId=${itemstre.pakkeId}" class="text-decoration-none">
                            <div class="col-12 rounded-5 text-black bg-white mt-3 p-3 ikonpil">
                                <ul class="ulliste">                               
                                    <li><img src="images/zalando.png" class="mb-2 zalando" alt="Zalando"></li>
                                    <li style="float: right" class="mx-3 mt-1"><i style="color: #FF6800" class="pil fa-solid fa-arrow-right fa-2xl"></i></li>
                                    <li style="float: right"><img src="images/postnord.png" class="mx-1 mb-2" alt="postnord"></li>                           
                                </ul>
                                <div>                           
                                    <p class="mt-2"><strong>Bestillingsnummer: </strong>${itemstre.pakkeNummer}</p>
                                    <p><strong>Afhentningskode: </strong>${itemstre.pakkeAfhentningskode}</p>                                                                                               
                                </div> 
                            </div>
                        </a>    
                     </div>                                                  
                </div>                    
          `;
            row.appendChild(col);
        }

        this.itemstre.innerHTML='';
        this.itemstre.appendChild(row);

    }

    async getData(){
        const response = await fetch('api4.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();
    }
}