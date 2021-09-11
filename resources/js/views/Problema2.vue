<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <b-card header-tag="header" footer-tag="footer">
                    <template #header>
                        <h6 class="mb-0">Problema 2</h6>
                    </template>
                    <b-card-text>
                        A biblioteca de uma universidade deseja fazer um algoritmo que leia 
                        o nome do livro emprestado, o tipo de usuário (professor ou aluno),
                        o algoritmo deve imprimir um recibo mostrando o nome do livro, o tipo
                        de usuário por extenso e o total de dias de empréstimo. 
                        <p>- Considerar que o professor tem 10 dias para devolver o livro e o aluno 
                            somente 3 dias.
                        </p>
                    </b-card-text>
                    <b-button v-on:click="calculateProblem()" variant="primary">Solução</b-button> 
                </b-card>
                <br>
                <div id="solution" v-if="!isHidden" >
                    <form v-on:submit.prevent="printReceipt">
                        <div class="row">
                            <div class="col">
                                <h6 class="mb-0 pb-1">Data de retirada:</h6>
                                <date-picker v-model="borrowing.date"  valueType="format" format="DD/MM/YYYY"></date-picker>
                            </div>
                            <div class="col">
                                <h6 class="mb-0 pb-1">Tipo de usuário:</h6>
                                <v-select :options="user_types" v-model="borrowing.user_type" label=""></v-select>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col">
                                <h6 class="mb-0 pb-1">Livro:</h6>
                                <v-select :options="books" v-model="borrowing.book" label="name"></v-select>
                            </div>
                        </div>  
                        <div class="row pt-4">
                            <div class="col">
                                <div class="float-right"><b-button type="submit" variant="primary">Confirmar</b-button></div>
                            </div>
                        </div> 
                        <div class="row pt-4" v-if="!isHiddenReceipt">
                            <div class="col">
                                <div class="float-right"><b-link :href="receipt_path" v-on:click="hideReceiptLink" target='_blank'>Baixar recibo</b-link></div>
                            </div>
                        </div> 
                    </form>               
                </div>
            </div>
        </div> 
    </div> 
</template>
<script>
export default {
    
    data() {    
            return {
                books: [],
                receipt_path: null,
                user_types: ['Professor', 'Aluno'],
                borrowing: {},
                isHidden: true,
                isHiddenReceipt: true
            }
    },
    created() {
        this.$axios.get('/books')
                    .then(response => {
                        this.books = response.data;
                        console.log(this.books);
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
        
    },
    methods: {
        calculateProblem(){
            if(this.isHidden == true){
                this.isHidden = false;
            }else{
                this.isHidden = true;
            }
            

        },
        hideReceiptLink(){
            this.isHiddenReceipt = true;
            this.receipt_path = null;

        },
        printReceipt(){
            this.$axios.post('/books/print-receipt', this.borrowing)
                    .then(response => {
                        this.receipt_path = response.data;
                        this.isHiddenReceipt = false;
                        window.open(this.receipt_path, '_blank');
                        //console.log(this.receipt);
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
        },
        getFile(file) {
            window.open("storage/" + file, "_blank");
        }

    }
}
</script>