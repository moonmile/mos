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
            v-model:mode="mode"
            v-on:onClickCommit="onClickCommit"
            v-on:onClickDelete="onClickDelete"
            
            />
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

/**
 * 登録ボタンを押下
 */
 function onClickCommit( item : Category ) {
    console.log( "main:onClickCommit " + item.title )
    console.log( "main:onClickCommit " + item.image )
    if ( mode.value == MODE.NEW ) {
        // 新規作成の場合 POST を呼ぶ
        createCategory( item )
    } else {
        // 更新の場合 PUT を呼ぶ
        updateCategory( item )
    }
}

/**
 * 削除するボタンを押下
 */
 function onClickDelete( item : Category ) {
    console.log( "main:onClickDelete ")
    // 削除 API を呼び出す
    deleteCategory( item )
}


//////////////////////////////////////////////////
// API 
//////////////////////////////////////////////////
/**
 * 新規作成のAPIを呼ぶ
 * @param item 更新する Category 
 */
 function createCategory( item: Category ) {
    console.log( "called createCategory" )
    // TODO: POST を記述する
    return 
}
/**
 * 更新のAPIを呼ぶ
 * @param item 更新する Category 
 */
 function updateCategory( item: Category ) {
    console.log( "called updateCategory" )
    // TODO: PUT を記述する
    axios.put(`http://localhost:8000/api/category/${item.id}`, item )
    .then ( response => {
        console.log( response )
        cur.value = response.data
    })
    return 
}

/**
 * 削除のAPIを呼ぶ
 * @param item 削除する Category 
 */
 function deleteCategory( item: Category ) {
    console.log( "called deleteCategory" )
    // TODO: DELETE を記述する
    return 
}


// ページ表示時に、カテゴリ一覧を取得する
onMounted(()=>{
    getCategories() 
})

</script>
