<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    public function index()
    {
        if(Auth::user()->isAdmin()){
            dd(Auth::user()->role_id);         
        }else{
            return 'no';
        }
        return view('prospects.index');
    }
}
