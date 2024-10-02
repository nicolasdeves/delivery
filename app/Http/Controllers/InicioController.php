<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio(){
        return view('site.index');
    }
    public function sobre_nos(){
        return view('site.sobre_nos');
    }
}