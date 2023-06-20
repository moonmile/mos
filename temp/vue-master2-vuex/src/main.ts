import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import { store } from './stores/store'

import './assets/main.css'

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(store) // vuex の利用

app.mount('#app')
