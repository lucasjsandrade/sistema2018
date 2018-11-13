<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Http\Controllers\Controller;

class InfoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){


        return view("sobre.index");
    }




}
