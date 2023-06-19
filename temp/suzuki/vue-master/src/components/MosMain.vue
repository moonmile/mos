<!-- MosMain -->
<template>
    <div>
        <h1>Mos Main by vue3</h1>

        <!-- 一覧 -->
        <div>
            <ul>
                <li v-for="it in items" :key="it.id">
                    {{ it.id }} : 
                    <!-- 選択時 -->
                    <a @click="onClickItem(it)" v-if="it.id == cur.id" style="color: dodgerblue;">{{ it.title }}</a>
                    <!-- 未選択時 -->
                    <a @click="onClickItem(it)" v-if="it.id !== cur.id">{{ it.title }}</a>
                </li>
            </ul>
        </div>

        <hr />

        <!-- 操作ボタン -->
        <div class="areaOpeBtn">
            <button @click="onClickCreateItem" class="btn btn-primary">Create New</button>

            <!-- 有効：カテゴリ取得時 -->
            <button @click="onClickEditItem" class="btn btn-primary" id="editBtn" v-if="cur.id">Edit</button>
            <button @click="onClickDeleteItem" class="btn btn-danger" id="deleteBtn" v-if="cur.id">Delete</button>
            <!-- 無効：カテゴリ未取得時 -->
            <button @click="onClickEditItem" class="btn btn-primary" id="editBtn" v-if="!cur.id" disabled>Edit</button>
            <button @click="onClickDeleteItem" class="btn btn-danger" id="deleteBtn" v-if="!cur.id" disabled>Delete</button>

        </div>

        <!-- 操作画面 -->
        <MosEditCategory
            v-model:mode="mode" v-model:cur="cur"
            @onClickClearItem="onClickClearItem"
            @onClickUndoItem="onClickUndoItem"
            @onClickSaveItem="onClickSaveItem"
        />
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import axios from 'axios'
import _ from 'lodash'
import { Category } from '../libs/Category'
import MosEditCategory from './MosEditCategory.vue'

// 操作モード
const mode = ref('view')
// カテゴリ一覧
const items = ref([] as Category[])
// 選択したカテゴリ
const cur = ref({} as Category)
// 変更前のカテゴリ
const pre = ref({} as Category)
// ダイアログの戻り値
const result = ref()

//////////////////////////////////////////////////
// API 
//////////////////////////////////////////////////

/**
 * カテゴリ一覧を取得する
 */
 function getCategories() {
    axios.get('http://localhost:8000/api/category')
    .then ( response => {
        console.log( response )
        items.value = response.data// TODO: items を使用しない
    })
}

/**
 * ひとつのカテゴリを取得する
 */
 function getCategoryById( id: number ) {
    axios.get(`http://localhost:8000/api/category/${id}`)
    .then ( response => {
        console.log( response )
        cur.value = response.data // TODO: cur を使用しない
    })
}

/**
 * カテゴリを新規登録する
 * 　@param item 入力したカテゴリ
 */
 function postCategory( item: Category ) {
    axios.post('http://localhost:8000/api/category', item )
    .then ( response => {
        console.log( response )
        getCategories() // TODO: 別で処理したい
        getCategoryById( response.data.id ) // TODO: 別で処理したい
    })
}

/**
 * 編集したカテゴリを更新する
 * 　@param item 編集したカテゴリ
 */
 function putCategory( item: Category ) {
    axios.put(`http://localhost:8000/api/category/${item.id}`, item )
    .then ( response => {
        console.log( response )
        getCategories() // TODO: 別で処理したい
        getCategoryById( item.id ) // TODO: 別で処理したい
    })
}

/**
 * 選択したカテゴリを削除する
 */
 function deleteCategoryById( id: number ) {
    axios.delete(`http://localhost:8000/api/category/${id}`)
    .then ( response => {
        console.log( response )
        getCategories() // TODO: 別で処理したい
    })
}

//////////////////////////////////////////////////

/**
 * ひとつのカテゴリを表示する
 * 　@param item 選択したカテゴリ
 */
 function onClickItem( item: Category ) {
    console.log( "onClickItem " + item.title )
    mode.value = 'view'
    getCategoryById( item.id )
}

/**
 * 新規作成画面を表示する
 */
 function onClickCreateItem() {
    console.log( "onClickCreateItem" )
    mode.value = 'create'
    cur.value = {} as Category
}

/**
 * 入力項目をクリアする
 */
 function onClickClearItem() {
    cur.value = {} as Category
 }

/**
 * 選択したカテゴリの編集画面を表示する
 */
 function onClickEditItem() {
    console.log( "onClickEditItem " + cur.value.title )
    mode.value = 'edit'
    pre.value = _.cloneDeep( cur.value ) // Undo 用に内容を保持
}

/**
 * 入力前の内容に戻す
 */
 function onClickUndoItem() {
    cur.value = _.cloneDeep( pre.value )
}

/**
 * 入力内容を保存する
 * 　⇒ 詳細画面に遷移
 */
 function onClickSaveItem() {
    result.value = confirm("入力した内容を保存しますか？")

    if(result.value == false) return // キャンセル

    // post ⇒ 新規作成, put ⇒ 更新
    if(mode.value == 'create') {
        postCategory( cur.value )
    } else {
        putCategory( cur.value )
    }

    mode.value = 'view'
}

/**
 * 選択したカテゴリを削除する
 * 　⇒ 初期状態に遷移
 */
 function onClickDeleteItem() {
    console.log( "onClickDeleteItem " + cur.value.title )
    result.value = confirm(`${cur.value.id} : ${cur.value.title} を削除しますか？`)

    if(result.value == false) return // キャンセル

    deleteCategoryById( cur.value.id )

    mode.value = 'view'
    cur.value = {} as Category
}

// ページ表示時に、カテゴリ一覧を取得する
onMounted( () => {
    getCategories() 
})
</script>

<style>
.areaOpeBtn {
    display: flex;
    justify-content: space-between;
}

.areaOpeBtn button {
    width: 33%;
}
</style>