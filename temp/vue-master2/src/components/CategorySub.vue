<template>
    <div>
        <h1>Category Sub</h1>
        
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
    <div>
        <!-- 詳細 -->
        <div v-if="mode == 'view'">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20%">ID</th>
                        <th style="width: 80%">{{ cur.id }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Category</td>
                        <td>{{ cur.category }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ cur.title }}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>{{ cur.image }}</td>
                    </tr>
                    <tr>
                        <td>作成日時</td>
                        <td>{{ cur.created_at }}</td>
                    </tr>
                    <tr>
                        <td>更新日時</td>
                        <td>{{ cur.updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 新規作成 -->
        <div v-if="mode == 'create'">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20%">ID</th>
                        <th style="width: 80%">{{ cur.id }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Category</td>
                        <td><input v-model="cur.category" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><input v-model="cur.title" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input v-model="cur.image" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>作成日時</td>
                        <td>{{ cur.created_at }}</td>
                    </tr>
                    <tr>
                        <td>更新日時</td>
                        <td>{{ cur.updated_at }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="inputOpeBtn">
                <button @click="onClickClearItem" class="btn btn-outline-warning">Clear</button>
                <button @click="onClickSaveItem" class="btn btn-primary">Save</button>
            </div>
        </div>

        <!-- 編集 -->
        <div v-if="mode == 'edit'">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20%">ID</th>
                        <th style="width: 80%">{{ cur.id }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Category</td>
                        <td><input v-model="cur.category" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><input v-model="cur.title" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input v-model="cur.image" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>作成日時</td>
                        <td>{{ cur.created_at }}</td>
                    </tr>
                    <tr>
                        <td>更新日時</td>
                        <td>{{ cur.updated_at }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="inputOpeBtn">
                <button @click="onClickUndoItem" class="btn btn-outline-warning">Undo</button>
                <button @click="onClickSaveItem" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>

    </div>
</template>
<script setup lang="ts">
import { ref, onMounted } from 'vue'
import axios from 'axios'
import _ from 'lodash'
import type { Category } from '../libs/Category'
import { useRoute, useRouter } from 'vue-router'

// ルーティング
const route = useRoute()
// 表示するカテゴリのID
const id = ref(0)
// 選択したカテゴリ
const cur = ref({} as Category)
// 変更前のカテゴリ
const pre = ref({} as Category)
// 操作モード
const mode = ref('view')
// ダイアログの戻り値
const result = ref()

onMounted(() => {
    id.value = Number(route.params.id) 
    if ( route.params.mode ) {
        mode.value = String(route.params.mode)
    } else {
        mode.value = 'view'
    }
    if ( id.value != 0 ) {
        getCategoryById( id.value )
    }
})

/**
 * ひとつのカテゴリを取得する
 */
 function getCategoryById( id: number ) {
    axios.get(`http://localhost:8000/api/category/${id}`)
    .then ( response => {
        console.log( response )
        cur.value = response.data 
        pre.value = _.cloneDeep( cur.value ) // Undo 用に内容を保持
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
    })
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


</script>

