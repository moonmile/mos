<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MosController extends Controller
{
    // メニュ－一覧を返す
    public function menu()
    {
        // menu.json を読み込み
        $dir = __DIR__ ;
        $result = file_get_contents( $dir . '/' . 'menu.json');
        // そのまま返す
        return $result ;
    }

    // 注文する
    /*
{ 
    "id": 0,
    "date": "2022-06-08T12:00:00.000Z",
    "total": 3,
    "totalPrice": 1150,
    "totalPriceTax": 1265,
    "orders": [
        { "id": 0, "count": 2, "price": 300 },
        { "id": 0, "count": 1, "price": 300 },
        { "id": 0, "count": 1, "price": 400 }
    ],
    "discount": -100,
    "coupon": { "name": "BGR01234", "discount": -50 }
}
     */
    public function order( Request $request ) 
    {
        \Log::debug( 'called order' ) ;
        // 配列に変換しておく
        try {
            $json = json_decode( $request->getContent(), true );
            // 注文フォーマットをチェックする
            // 不正の場合は、例外が発生する
            $id = $json['id'] ;
            $date = $json['date'] ;
            $total = $json['total'] ;
            $totalPrice = $json['totalPrice'] ;
            $totalPriceTax = $json['totalPriceTax'] ;
            $orders = $json['orders'] ;
            if (count($orders) == 0 ) {
                $result = [
                    'result' => false,
                    'message' => "no orders",
                ];
                return $result;
            }
        } catch ( \Exception $ex ) {
            $result = [
                'result' => false,
                'message' => "order error",
            ];
            return $result;
        }

        \Log::debug( $json ) ;
        // クライアントに成功を返す
        $result = [
            'result' => true,
            'message' => 'ご注文ありがとうございました。',
        ];
        return $result;
    }

    /// クーポン券のチェック
    /// request:  { "name": "BGR01234" }
    /// response: { "name": "BGR01234", "discount": -50 }
    public function coupon( Request $request )  
    {
        \Log::debug( 'called coupon' ) ;
        // 配列に変換しておく
        try {
            $json = json_decode( $request->getContent(), true );
            $name = $json['name'] ;
        } catch( \Exception $ex )  {
            $result = [
                'name' => "ERROR",
                'discount' => 0,
            ];
            return $result;
        }

        // クーポン券は8文字固定
        if ( strlen($name) != 8 ) {
            $result = [
                'name' => "ERROR",
                'discount' => 0,
            ];
            return $result;
        }

        // 先頭の3文字だけチェックする
        if ( substr($name,0,3) == 'BGR' ) {
            $result = [
                'name' => $name,
                'discount' => -100,
            ];
            return $result;
        } elseif ( substr($name,0,3) == 'DRK' ) {
            $result = [
                'name' => $name,
                'discount' => -20,
            ];
            return $result;
        } elseif ( substr($name,0,3) == 'SID' ) {
            $result = [
                'name' => $name,
                'discount' => -20,
            ];
            return $result;
        } else {

            $result = [
                'name' => "ERROR",
                'discount' => 0,
            ];
            return $result;
        }
    }

}   
