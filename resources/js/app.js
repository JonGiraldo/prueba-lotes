import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'
import './bootstrap';
import { createApp } from 'vue'
import Usuarios from './componentes/Usuarios.vue'
import Lotes from './componentes/Lotes.vue'

createApp({
    components:{
        Lotes
    }
}).mount('#app')
