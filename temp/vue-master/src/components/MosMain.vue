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

        <div v-if="mode == MODE.DETAIL">
            <table class="table">
                <thead>
                    <tr>
                        <th>項目</th>
                        <th>値</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
        <div v-if="mode == MODE.NEW">
            <div>新規作成のモード</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>項目</th>
                        <th>値</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>title: </td>
                    <td><input v-model="cur.title" placeholder="タイトル" /></td>
                </tr>
                <tr>
                    <td>image: </td>
                    <td><input v-model="cur.image" placeholder="画像" /></td>
                </tr>
            </tbody>
            </table>
            <button @click="onClickCommit" class="btn btn-primary">登録</button>　
            <button @click="onClickClear" class="btn btn-secondary">クリア</button>
        </div>
        <div v-if="mode == MODE.UPDATE">
            <div>更新のモード</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>項目</th>
                        <th>値</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>id: </td>
                        <td>{{  cur.id }}</td>
                    </tr>
                    <tr>
                        <td>title: </td>
                        <td><input v-model="cur.title" placeholder="タイトル" /></td>
                    </tr>
                    <tr>
                        <td>image: </td>
                        <td><input v-model="cur.image" placeholder="画像" /></td>
                    </tr>
                    <tr>
                        <td>作成日時: </td><td>{{  cur.created_at }}</td>
                    </tr>
                    <tr>
                        <td>更新日時: </td><td>{{  cur.updated_at }}</td>
                    </tr>
                </tbody>
            </table>
            <button @click="onClickCommit" class="btn btn-primary">登録</button>　
            <button @click="onClickClear" class="btn btn-secondary">戻す</button>
        </div>
        <div v-if="mode == MODE.DELETE">
            <div>削除のモード</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>項目</th>
                        <th>値</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
            <button @click="onClickDelete" class="btn btn-danger">削除する</button>　
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
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
 * 登録ボタンを押下
 */
function onClickCommit() {
    console.log( "onClickCommit " + cur.value.title )
    console.log( "onClickCommit " + cur.value.image )
    if ( mode.value == MODE.NEW ) {
        // 新規作成の場合 POST を呼ぶ
        createCategory( cur.value )
    } else {
        // 更新の場合 PUT を呼ぶ
        updateCategory( cur.value )
    }
}

/**
 * クリアボタンを押下
 */
 function onClickClear() {
    console.log( "onClickClear ")
    if ( mode.value == MODE.NEW ) {
        // 新規作成の場合
        cur.value.title = ""
        cur.value.image = ""
    } else {
        const original = items.value.find( x => x.id == cur.value.id )
        if ( original ) {
            // 更新の場合
            cur.value.title = original.title
            cur.value.image = original.image
        }
    }
}

/**
 * 削除するボタンを押下
 */
function onClickDelete() {
    console.log( "onClickDelete ")
    // 削除 API を呼び出す
    deleteCategory( cur.value )
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

    /*
    const result = confirm("削除してよろしいですか？")
    if ( result == true ) {
        deleteCategory( cur.value )
    }
    */
}

// ページ表示時に、カテゴリ一覧を取得する
onMounted(()=>{
    getCategories() 
})

</script>
