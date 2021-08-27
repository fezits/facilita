import ExampleComponent from '../components/ExampleComponent.vue'
import Problema1 from '../views/Problema1.vue'
import Problema2 from '../views/Problema2.vue'
import Problema3 from '../views/Problema3.vue'
import Problema4 from '../views/Problema4.vue'

const routes = [
    {
        path:'/',
        name: 'home',
        component: ExampleComponent,
        meta: { title: 'Exemplo' }
    },
    {
        path:'/problema-1',
        name: 'problema-1',
        component: Problema1,
        meta: { title: 'Problema 1' }
    },
    {
        path:'/problema-2',
        name: 'problema-2',
        component: Problema2,
        meta: { title: 'Problema 2' }
    },
    {
        path:'/problema-3',
        name: 'problema-3',
        component: Problema3,
        meta: { title: 'Problema 3' }
    },
    {
        path:'/problema-4',
        name: 'problema-4',
        component: Problema4,
        meta: { title: 'Problema 4' }
    }
];

export default routes;