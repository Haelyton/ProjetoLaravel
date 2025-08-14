<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello World from Laravel!',
            'dados' => [
                ['produto' => 'Câmera Canon EOS Rebel T7', 'preco' => 2500],
                ['produto' => 'Cartão SanDisk 64GB', 'preco' => 150]
            ]
        ]);
    }
}
