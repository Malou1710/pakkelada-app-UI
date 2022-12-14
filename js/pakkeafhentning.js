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
                        <div class="col-12">
                            <div class="text-white bg-black mt-3">
                                <p>Bestillingsnummer:${items.pakkeNummer}</p>
                                <p>Afhentningskode:${items.pakkeAfhentningskode}</p>                                                                   
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

