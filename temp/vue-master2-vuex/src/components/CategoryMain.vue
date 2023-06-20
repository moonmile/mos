<template>
    <div>
        <h1>Mos Main by vue3</h1>

        <!-- 一覧 -->
        <div>
            <button @click="onClickCreateItem" class="btn btn-primary">New Item</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="it in items" :key="it.id">
                        <td>{{  it.id }}</td>
                        <td>{{  it.title }}</td>
                        <td><button @click="onClickItem(it)" class="btn btn-primary">Detail</button></td>
                        <td><button @click="onClickItemEdit(it)" class="btn btn-secondary">Edit</button></td>
                        <td><button @click="onClickItemDelete(it)" class="btn btn-danger">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import _ from 'lodash'
import type { Category } from '../libs/Category'
import { useRoute, useRouter } from 'vue-router'

// vuex の利用
import { useStore } from 'vuex' 
const store = useStore()

// 操作モード
const mode = ref('view')
// カテゴリ一覧
// const items = ref([] as Category[])
const items = computed(() => store.getters.items ) // for vuex 

// 選択したカテゴリ
const cur = ref({} as Category)
// 変更前のカテゴリ
const pre = ref({} as Category)
// ダイアログの戻り値
const result = ref()
// ルーティング
const router = useRouter()

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
        // items.value = response.data// TODO: items を使用しない
        store.commit('setitems', { items: response.data }) // for vuex
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
    // CategorySub を開く
    router.push( { name: "mossub", params: { id: item.id, mode: 'view' }})
}

/**
 * 編集ボタンをクリック
 * 　@param item 選択したカテゴリ
 */
 function onClickItemEdit( item: Category ) {
    console.log( "onClickItemEdit " + item.title )
    // CategorySub を開く
    router.push( { name: "mossub", params: { id: item.id, mode: 'edit' }})
}

/**
 * 削除ボタンをクリック
 * 　@param item 選択したカテゴリ
 */
 function onClickItemDelete( item: Category ) {
    console.log( "onClickItemDelete " + item.title )
    // 削除の問い合わせ
}


/**
 * 新規作成画面を表示する
 */
 function onClickCreateItem() {
    console.log( "onClickCreateItem" )
    // CategorySub を開く
    router.push( { name: "mossub", params: { id: 0, mode: 'create' }})
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
    // getCategories()
    store.dispatch('getCategories') // for vuex
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