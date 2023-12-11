<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
	public function __invoke()
	{
		return view('home.index');
	}
	
}
