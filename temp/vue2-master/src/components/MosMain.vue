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
    onClickItem( item )
    {
        console.log( "onClickItem " + item.title )
        this.getCategoryById( item.id )
    },  
  }
}

</script>