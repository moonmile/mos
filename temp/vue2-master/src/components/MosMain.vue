<template>
    <div>
        <h1>Mos Main by vue2</h1>
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
        <div>
        <!-- カテゴリ情報を表示 -->
            <div v-if="mode == 0">
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
            <div v-if="mode == 1">
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
            <div v-if="mode == 2">
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
            <div v-if="mode == 3">
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
    </div>
</template>
<script>
import axios from 'axios'

export default {
  name: 'MosMain',
  props: {
  },
  data() {
    return {
        items: [],  // カテゴリ一覧
        cur: {},    // 選択したカテゴリ
        mode: 0,    // 表示モード
    }
  },
  mounted() {
    axios.get('http://localhost:8000/api/category')
    .then ( response => {
        console.log( response )
        this.items = response.data
    })
  },
  methods: {
    getCategoryById( id ) 
    {
        axios.get(`http://localhost:8000/api/category/${id}`)
        .then ( response => {
            console.log( response )
            this.cur = response.data
        })
    },
    // 新規作成のAPIを呼ぶ
    createCategory( item ) {
        console.log( "called createCategory" )
        // TODO: POST を記述する
        return 
    },
    // 更新のAPIを呼ぶ
    updateCategory( item ) {
        console.log( "called updateCategory" )
        // TODO: PUT を記述する
        return 
    },
    // 選択項目を新規作成する
    onClickCreateItem() {
        console.log( "onClickCreateItem " + this.cur.title )
        this.mode = 1
        this.cur.id = 0
        this.cur.title = ""
        this.cur.image = ""
    },
    // 登録ボタンを押下
    onClickCommit() {
        console.log( "onClickCommit " + this.cur.title )
        console.log( "onClickCommit " + this.cur.image )
        if ( this.mode == 1 ) {
            // 新規作成の場合 POST を呼ぶ
            createCategory( this.cur )
        } else {
            // 更新の場合 PUT を呼ぶ
            updateCategory( this.cur )
        }
    },
    // クリアボタンを押下
    onClickClear() {
        console.log( "onClickClear ")
        if ( this.mode == 1 ) {
            // 新規作成の場合
            this.cur.title = ""
            this.cur.image = ""
        } else {
            const original = this.items.find( x => x.id == this.cur.id )
            if ( original ) {
                // 更新の場合
                this.cur.title = original.title
                this.cur.image = original.image
            }
        }
    },
    // 
    onClickDelete() {
        console.log( "onClickDelete ")
        // 削除 API を呼び出す
        deleteCategory( this.cur )
    },

    // リストで項目を選択
    onClickItem( item )
    {
        console.log( "onClickItem " + item.title )
        this.getCategoryById( item.id )
    },  
  
    /**
     * 選択項目を更新する
     */
    onClickUpdateItem() {
        if ( !this.cur.id ) {
            console.log( "ERROR: onClickUpdateItem cur.value.id is null" )
            return 
        }
        console.log( "onClickUpdateItem " + this.cur.title )
        this.mode = 2
    },

    /**
     * 選択項目を削除する
     */
    onClickDeleteItem() {
        if ( !this.cur.id ) {
            console.log( "ERROR: onClickDeleteItem cur.value.id is null" )
            return 
        }
        console.log( "onClickDeleteItem " + this.cur.title )
        this.mode = 3
    },


    }



}

</script>