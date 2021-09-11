<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <b-card header-tag="header">
                    <template #header>
                        <h6 class="mb-0">Problema 1</h6>
                    </template>
                    <b-card-text>Chico tem 1,50m e cresce 2 centímetros por ano. Enquanto Juca tem 1,10m e cresce 3 centímetros por ano.
                        Construa um algorítmo que calcule e imprima quantos anos serão necessários
                        para que Juca seja maior que Chico.  </b-card-text>
                    <b-button v-on:click="calculateProblem()" variant="primary">Solução</b-button> 
                    
                </b-card>   
                <div id="solution" v-if="!isHidden" >
                     <br>
                    <div>Serão necessários {{time}} meses ou {{years}} anos. </div>
                    <br>
                    <b-table striped hover :items="items" :fields="fields"></b-table> 
                </div>
            </div>
        </div> 
    </div> 
</template>
<script>
 export default {
     
    data() {    
            return {
                isHidden: true,
                time: 0,
                items:[],
                years: 0,   
                fields: [{ key: 'month', label: 'Mês' },
                        'chico','juca'
                       ]
                              
            }
    },
    methods: {
        calculateProblem(){
            this.items = [];
            this.years = null;
            this.time = null;

            var chico = 1.50;
            var chico_growth = 0.02;
            
            var juca = 1.10;
            var juca_growth = 0.03;
            this.isHidden = false;
            var obj = {
            length: 0,
            //function to iterate object after adding
            addElem: function addElem(elem) {
                    [].push.call(this, elem);
                }
            };

            //iterate until Juca reaches Chico's height
            while(juca <= chico){
        
                juca = juca + juca_growth;
                chico = chico + chico_growth
                this.time = this.time + 1;
                obj.addElem({month: this.time, 
                             chico: Math.floor(chico * 100) / 100,
                             juca:  Math.floor(juca * 100) / 100
                             });

            

            }
                //adding one more iteration for Juca to be the tallest
                
                juca = juca + juca_growth;
                chico = chico + chico_growth
                this.time = this.time + 1;
                obj.addElem({month: this.time, 
                             chico: Math.floor(chico * 100) / 100,
                             juca:  Math.floor(juca * 100) / 100,
                             _cellVariants: {juca}
                             });

                //object to array
                this.items = Object.values(obj)
                this.years = this.time/12;
            

        },

    }
 }
</script>