<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dress; // ! il mio model ! //

class MainController extends Controller
{
    public function index() {
		return view('home');
	}
}
