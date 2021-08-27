<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <b-card header-tag="header" footer-tag="footer">
                    <template #header>
                        <h6 class="mb-0">Home</h6>
                    </template>
                    <b-card-text> 
                        <p>Seja bem-vindo ao meu código.</p>
                        <p>Meu nome é Fernando Braidatto.</p>
                    </b-card-text>
                    
                </b-card>
                <div class="card">
                  
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
