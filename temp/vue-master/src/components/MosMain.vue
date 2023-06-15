<template>
    <div>
        <h1>Mos Main by vue3 </h1>
        <div>
            <ul>
            <li v-for="it in items" :key="it.id">
                    {{ it.id }} : <a @click="onClickItem(it)">{{ it.title }}</a>
                </li> 
            </ul>
        </div>
        <hr />
        <button @click="onClickCreateItem" class="btn btn-primary">新規作成</button>　  
        <button @click="onClickUpdateItem" class="btn btn-secondary">更新</button>　
        <button @click="onClickDeleteItem" class="btn btn-danger">削除</button>

        <hr />
        <!-- カテゴリ情報を表示 -->
        <mos-edit-category 
            v-model:item="cur" 
            v-model:mode="mode"/>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import axios from 'axios'
import MosEditCategory from './MosEditCategory.vue';

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
// 表示モード（列挙型)
enum MODE {
    DETAIL,     // 詳細
    NEW,        // 新規作成
    UPDATE,     // 更新
    DELETE,     //　削除
}
const mode = ref(MODE.DETAIL)



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
    mode.value = MODE.DETAIL
    getCategoryById( item.id )
}

/**
 * 選択項目を新規作成する
 */
function onClickCreateItem() {
    console.log( "onClickCreateItem " + cur.value.title )
    mode.value = MODE.NEW
    cur.value.id = 0
    cur.value.title = ""
    cur.value.image = ""
}


/**
 * 選択項目を更新する
 */
function onClickUpdateItem() {
    if ( !cur.value.id ) {
        console.log( "ERROR: onClickUpdateItem cur.value.id is null" )
        return 
    }
    console.log( "onClickUpdateItem " + cur.value.title )
    mode.value = MODE.UPDATE
    
}

/**
 * 選択項目を削除する
 */
function onClickDeleteItem() {
    if ( !cur.value.id ) {
        console.log( "ERROR: onClickDeleteItem cur.value.id is null" )
        return 
    }
    console.log( "onClickDeleteItem " + cur.value.title )
    mode.value = MODE.DELETE
}

// ページ表示時に、カテゴリ一覧を取得する
onMounted(()=>{
    getCategories() 
})

</script>
