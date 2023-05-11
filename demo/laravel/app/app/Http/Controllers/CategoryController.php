<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category ;
use Carbon\Carbon;

class CategoryController extends Controller
{
    // 全てのカテゴリーを返す
    public function index()
    {
        $items = Category::where('is_delete', false)->get() ;
        return $items ;
    }

    // 指定したidのカテゴリーを返す
    public function show($id)
    {
        $item = Category::find($id) ;
        return $item ;
    }

    // カテゴリを新規作成する
    public function store(Request $request)
    {
        $item = new Category() ;
        $item->category = $request->category ;
        $item->title  = $request->title ;
        $item->image  = $request->image ;
        $item->save() ;
        return $item ;
    }

    // 指定したカテゴリを更新する
    public function update(Request $request, $id)
    {
        $item = Category::find($id) ;
        if ( $item->updated_at != null ) {
            if ( Carbon::instance($item->updated_at)->toJSON() != $request->updated_at ) {
                // updated_at が異なる場合
                $dt = Carbon::instance($item->updated_at)->toJSON() ;
                \Log::debug( "item: $dt");
                \Log::debug( "request: $request->updated_at");
                return [ "result" => "NG", "message" => "other updated" ];
            }
        } 
        $item->category = $request->category ;
        $item->title  = $request->title ;
        $item->image  = $request->image ;
        $item->save() ;
        return $item ;
    }

    // 指定idのカテゴリを削除
    public function destroy($id)
    {
        $item = Category::find($id) ;
        $item->is_delete = true ;
        $item->save() ;
        return [ "result" => "OK" ];
    }
}
