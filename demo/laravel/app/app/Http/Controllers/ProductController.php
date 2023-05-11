<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product ;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    // 商品一覧
    public function index()
    {
        // $items = Product::all() ;
        // カテゴリの情報も一緒に取得する
        $items = Product::with('category')
            ->where('is_delete', false)
            ->get() ;
        return $items ;
    }
    
    // idを指定して商品を返す
    public function show($id)
    {
        $item = Product::with('category')->find($id) ;
        return $item ;
    }

    // 商品の新規作成
    public function store(Request $request)
    {
        $item = new Product ;

        $item->title  = $request->title ;
        $item->image  = $request->image ;
        $item->price  = $request->price ;
        $item->category_id  = $request->category_id ;

        $item->save() ;
        return $item ;
    }

    // 指定した商品を更新する
    public function update(Request $request, $id)
    {
        if ( $request->price >= 10000 ) {
            return [ "error" => "NG" ];
        }
        $item = Product::find($id) ;
        if ( $item->updated_at != null ) {
            if ( Carbon::instance($item->updated_at)->toJSON() != $request->updated_at ) {
                // updated_at が異なる場合
                $dt = Carbon::instance($item->updated_at)->toJSON() ;
                \Log::debug( "item: $dt");
                \Log::debug( "request: $request->updated_at");
                return [ "result" => "NG", "message" => "other updated" ];
            }
        } 

        $item->title  = $request->title ;
        $item->image  = $request->image ;
        $item->price  = $request->price ;
        $item->category_id  = $request->category_id ;
        $item->save() ;
        return $item ;
    }

    // 指定idの商品を削除する
    public function destroy($id)
    {
        $item = Product::find($id) ;
        $item->is_delete = true ;
        $item->save() ;
        return [ "result" => "OK" ];
    }
}
