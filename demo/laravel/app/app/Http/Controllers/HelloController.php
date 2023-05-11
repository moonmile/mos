<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        $result = [
            'result' => true,
            'message' => 'Hello, masuda',
        ];
        return $result ;
    }
}
