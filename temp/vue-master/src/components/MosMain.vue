
<template>
    <h1>Mos Main</h1>

    <div>
        <ul>
           <li v-for="it in items" :key="it.id">
                {{ it.id }} : <a @click="onClickItem(it)">{{ it.title }}</a>
            </li> 
        </ul>
    </div>
    <hr />
    <div>
        <table class="table">
            <tr>
                <td>id: </td><td>{{  cur.id }}</td>
            </tr>
            <tr>
                <td>title: </td><td>{{  cur.title }}</td>
            </tr>
            <tr>
                <td>image: </td><td>{{  cur.image }}</td>
            </tr>
            <tr>
                <td>作成日時: </td><td>{{  cur.created_at }}</td>
            </tr>
            <tr>
                <td>更新日時: </td><td>{{  cur.updated_at }}</td>
            </tr>
        </table>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import axios from 'axios'

/**
 * カテゴリのクラス
 */
class Category {
    id: number
    title: string
    category: string
    image: string
    created_at: string | null
    updated_at: string | null
    is_delete: boolean
}

// カテゴリ一覧
const items = ref([] as Category[])
// 選択したカテゴリ
const cur = ref({} as Category)


/**
 * カテゴリ一覧を取得する
 */
function getCategories() {
    axios.get('http://localhost:8000/api/category')
    .then ( response => {
        console.log( response )
        items.value = response.data
    })
}
/**
 * ひとつのカテゴリを取得する
 */
 function getCategoryById( id: number  ) {
    axios.get(`http://localhost:8000/api/category/${id}`)
    .then ( response => {
        console.log( response )
        cur.value = response.data
    })
}

/**
 * ひとつのカテゴリを表示する
 * @param item 選択したカテゴリ
 */
function onClickItem( item : Category) {
    console.log( "onClickItem " + item.title )
    getCategoryById( item.id )
}


// ページ表示時に、カテゴリ一覧を取得する
getCategories() 

</script>
