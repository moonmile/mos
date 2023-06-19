<!-- MosEditCategory.vue -->
<template>
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
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { Category } from '../libs/Category'

const props = defineProps({
    mode: { type: String },
    cur: { type: Object },
})

// 操作モード
const mode = computed(() => props.mode)
// 選択したカテゴリ
const cur = computed(() => props.cur as Category)

const emit = defineEmits([
    'onClickClearItem',
    'onClickUndoItem',
    'onClickSaveItem',
])

/**
 * Clear ボタンのイベントを発火
 */
 function onClickClearItem() {
    console.log( "onClickClearItem" )
    emit( 'onClickClearItem' )
}

/**
 * Undo ボタンのイベントを発火
 */
 function onClickUndoItem() {
    console.log( "onClickUndoItem" )
    emit( 'onClickUndoItem' )
}

/**
 * Save ボタンのイベントを発火
 */
 function onClickSaveItem() {
    // Category, Title, Iamge がすべて入力されているかチェック
    if(!(cur.value.category && cur.value.title && cur.value.image)) {
        console.error( "Error: onClickSaveItem" )
        alert("入力されていない項目があります。")
        return
    }

    console.log( "onClickSaveItem " + cur.value.title )
    emit( 'onClickSaveItem' )
}
</script>

<style>
.inputOpeBtn {
    display: flex;
    justify-content: space-between;
}

.inputOpeBtn button {
    width: 20%;
}
</style>