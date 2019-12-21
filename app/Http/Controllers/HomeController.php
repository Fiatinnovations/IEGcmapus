<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prospect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prospects = Prospect::all();
        return view('home', compact('prospects'));
    }
}
