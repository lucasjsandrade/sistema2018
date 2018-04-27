<?php
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Collection;


namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;

class desenvolvimentoController extends Controller
{



	public function __construct(){
		$this->middleware('auth');
	}

	public function index(Request $request){

		//return Redirect::to('layouts.index');
		
		echo "<script>window.location = 'layouts';</script>";
	}


}