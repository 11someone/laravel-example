<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PruebaController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('Prueba/prueba', ['numbers' => [1,2,3,4,5,6,7,8,9],
                'message' => 'esto es un componente']);
        }else{
            return 'sin permiso';
        }

    }

    public function test(){
        $test = Test::query()->get(['*']);
        return $test;
    }
}
