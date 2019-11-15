<?php

namespace App\Http\Controllers;
use App\User;
use App\Prospect;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    public function index(){
        
        if(Gate::allows('allProspects')){
            $user = Auth::User();
            $prospects = Prospect::all();
            return view('prospects.index', compact('prospects', 'user'));
        }else{
            Gate::allows('myProspects');
            $user = Auth::User();
            $agentProspect = $user->prospects()->get();
            return view('prospect.index', compact('prospect', 'user'));
        }
              
}

}
