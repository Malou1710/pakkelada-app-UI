export default class Pakkeafhentning{
    constructor() {
        this.data = {
            password: 4700
        }

        this.rootElem = document.querySelector('.pakkeafhentning')
        this.items = this.rootElem.querySelector('.items');
    }

    async init(){
        await this.render();
    }

    async render(){
        const data = await this.getData();

        const row = document.createElement('div');
        row.classList.add('row');

        for(const items of data){
            const col = document.createElement('div');
            col.classList.add('col-12');

            col.innerHTML= `
                <div class="container-fluid">         
                     <div class="row">
                        <div class="col-12 rounded-5 text-black bg-white mt-3 p-3 ikonpil">
                            <ul class="ulliste">                               
                                <li><img src="images/zalando" class="mb-2 zalando" alt="Zalando"></li>
                                <li style="float: right" class="mx-3 mt-1"><i style="color: #FF6800" class="pil fa-solid fa-arrow-right fa-2xl"></i></li>
                                <li style="float: right"><img src="images/postnord" class="mx-1 mb-2" alt="postnord"></li>                           
                            </ul>
                            <div>                           
                                <p class="mt-2"><strong>Bestillingsnummer: </strong>${items.pakkeNummer}</p>
                                <p><strong>Afhentningskode: </strong>${items.pakkeAfhentningskode}</p>                                                                                               
                            </div> 
                        </div>
                     </div>                                                  
                </div>                    
          `;
            row.appendChild(col);
        }

        this.items.innerHTML='';
        this.items.appendChild(row);

    }

    async getData(){
        const response = await fetch('api2.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();
    }
}

