<!-- カテゴリ表示 -->
<template>
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
</template>

<script setup lang="ts">
import { ref, reactive, onUpdated, watch, computed } from 'vue'
import axios from 'axios'
import _ from 'lodash'

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

// 表示モード（列挙型)
enum MODE {
    DETAIL,     // 詳細
    NEW,        // 新規作成
    UPDATE,     // 更新
    DELETE,     //　削除
}


const props = defineProps({
    item: { type: Object },
    mode: { type: Object },
})

const emit = defineEmits(['onClickCommit', 'onClickDelete'])
/*
const emit = defineEmits<{
  (event: 'onClickCommit', item: Category): void
}>()
*/

// モード
const mode = computed(() => props.mode ?? 0 as MODE)
// 選択したカテゴリ
const cur = computed(() => props.item as Category)

// 変更前のカテゴリを保存しておく
let original = {} as Category

watch(cur, (next, old) => {
    original = _.cloneDeep(next)
})





/**
 * 登録ボタンを押下
 */
 function onClickCommit() {
    console.log( "child:onClickCommit " + cur.value.title )
    emit('onClickCommit', cur.value )
    /*
    console.log( "onClickCommit " + cur.value.title )
    console.log( "onClickCommit " + cur.value.image )
    if ( mode.value == MODE.NEW ) {
        // 新規作成の場合 POST を呼ぶ
        createCategory( cur.value )
    } else {
        // 更新の場合 PUT を呼ぶ
        updateCategory( cur.value )
    }
    */
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
    console.log( "child:onClickDelete ")
    emit('onClickDelete', cur.value )
    // 削除 API を呼び出す
    // deleteCategory( cur.value )
}


</script>
