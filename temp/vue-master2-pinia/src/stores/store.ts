
import { createStore } from 'vuex'
import axios from 'axios'
import type { Category } from '../libs/Category'

export const store = createStore({
    state: {
        items: [] as Category[]
    },
    getters: {
        items: state => state.items 
    },
    // 同期処理を記述
    mutations: {
        setitems( state, payload ) {
            state.items = payload.items 
        }
    },
    // 非同期処理を記述
    actions: {
        setItems( { commit }, payload ) {
            store.commit('setitems', payload )
        },
        getCategories( { commit } ) {
            axios.get('http://localhost:8000/api/category')
            .then ( response => {
                store.commit('setitems', { items: response.data })
            })
        } 
    }
})
