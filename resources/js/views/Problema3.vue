<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <b-card header-tag="header" footer-tag="footer">
                    <template #header>
                        <h6 class="mb-0">Problema 3</h6>
                    </template>
                    <b-card-text> Criar um algoritmo que gere uma matriz 5x5 e imprima:
                            <p>toda a matriz, a matriz gerada apenas com os números ímpares e outra só com os números pares.</p></b-card-text>
                    <b-button v-on:click="calculateProblem()" variant="primary">Solução</b-button> 
                </b-card>
                <div id="solution" v-if="!isHidden" >
                    <br>
                    <p><b>Matriz completa</b></p>
                    <div class="row" v-for="(item, index) in items">
                          <div class="col-sm" v-for="(it, index) in item">
                             {{it}}
                          </div>    
                        
                    </div>
                    <br><br>
                    <p><b>Resultado com números pares</b></p>
                    <div class="d-flex justify-content-start">
                        <div class="d-flex justify-content-start px-3" v-for="(item, index) in evens">
                            {{item}}
                        </div>    
                    </div>   
                   <br><br>
                    <p><b>Resultado com números ímpares</b></p>
                    <div class="row d-flex justify-content-start">
                        <div class="d-flex justify-content-start px-3" v-for="(item, index) in odds">
                            {{item}}
                        </div> 
                    </div> 
                    <br><br>
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
                items: [],
                odds: [],
                evens: []
            }
    },
    methods: {
        calculateProblem(){
            this.isHidden = false;

            //generate random INT number, passing min and max values
            function getIntRandom(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            // get even and odd numbers from multdimensional array given
            function getEvenOddNumbers(array, side){
                var odds = [];
                var evens = [];
                for(var m = 0; m < array.length; m++){
                    for(var k =0; k < array.length; k++){
                        
                        if(array[m][k] % 2 == 0){ 
                            
                            evens.push(array[m][k]);
                           
                        }else{
                            //odd
                            odds.push(array[m][k]);
                        }
                    }
                }
                 
                 if(side == "even"){
                     return evens;
                 }else if(side == "odd"){
                     return odds;
                 }
                 
                
            }
            // create array based on size given (5x5, for eg.)
           function createArray(width, height){
                var result = [];
                for (var i = 0 ; i < width; i++) {
                    result[i] = [];
                    for (var j = 0; j < height; j++) {
                        result[i][j] = getIntRandom(1,1000);
                    }
                }
                return result;
            }
            //create 2D Array 5x5
            var array2D = createArray(5, 5);
            this.items = array2D;

            //get Even and Odd Numbers from 2D array
            this.evens = getEvenOddNumbers(this.items,"even");
            this.odds = getEvenOddNumbers(this.items,"odd");


            
            
        },

    }
 }
</script>