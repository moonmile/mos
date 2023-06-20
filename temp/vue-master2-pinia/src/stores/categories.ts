import { defineStore } from 'pinia'
import type { Category } from '../libs/Category'
import axios from 'axios'
import { store } from './store'

export const useCategory = defineStore('category', {

    state: () => ({
        items: [] as Category[]
    }),
    getters: {
        Items( state ) {
            return state.items
        }
    },
    actions: {
        getCategories() {
            axios.get('http://localhost:8000/api/category')
            .then ( response => {
                this.items = response.data 
            })
        } 
    }
})

