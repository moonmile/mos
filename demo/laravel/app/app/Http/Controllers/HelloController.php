<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        \Log::Debug("called HelloController::index") ; 

        $x = 10 ;
        
        $result = [
            'result' => true,
            'message' => 'Hello, masuda',
        ];
        return $result ;
    }
}
