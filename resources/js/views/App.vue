<template>
    <div>
        <div>
            <b-navbar toggleable="lg" variant="info" type="light">
                 <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                <b-navbar-brand class="mx-auto d-block text-center order-0 order-md-1 text-white strong" href="#">{{currentRouteTitle }}</b-navbar-brand>

               

                <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item><router-link :to="{name: 'home'}"><span  class="text-white pl-2"><b>FACILITA</b></span></router-link></b-nav-item>
                    <b-nav-item><router-link :to="{name: 'problema-1'}"><span  class="text-white pl-2">Problema 1</span></router-link></b-nav-item>
                    <b-nav-item><router-link :to="{name: 'problema-2'}"><span  class="text-white pl-2">Problema 2</span></router-link></b-nav-item>
                    <b-nav-item><router-link :to="{name: 'problema-3'}"><span  class="text-white pl-2">Problema 3</span></router-link></b-nav-item>
                    <b-nav-item><router-link :to="{name: 'problema-4'}"><span  class="text-white pl-2">Problema 4</span></router-link></b-nav-item>
                    
                </b-navbar-nav>
                

                <!-- Right aligned nav items -->
                
                </b-collapse>
            </b-navbar>
        </div>
         
        
        
       
            <div class="container-fluid pt-2 pl-3 pr-3">
                <div class="row">
                   
                        <router-view></router-view>
                    
                </div>
            </div>
            
       
    </div> 
</template>
<script>

export default {
        name: "App",
        data() {
            return {
               
            }
        },
        created() {
            
        },
        methods: {
           
        },
        computed: {
        currentRouteTitle() {
            return this.$route.meta.title;
        }
    }
  }

</script>