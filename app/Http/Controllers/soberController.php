<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;

class soberController extends Controller
{
   



   public function index(Request $request){

        
            return view('sobre.index');
        }
    }

}
