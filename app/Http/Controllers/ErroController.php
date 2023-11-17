<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErroController extends Controller
{
    public function index(){
        return view("modal.modal");
    }
}
