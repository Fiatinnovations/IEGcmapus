<?php

namespace App\Http\Controllers;
use App\User;
use App\Prospect;
use App\Title;
use App\Gender;
use App\Course;
use App\University;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ProspectController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        
        if(Gate::allows('allProspects')){
            $user = Auth::User();
            $prospects = Prospect::all();
            return view('prospects.index', compact('prospects', 'user'));
        }else{
            Gate::allows('myProspects');
            $user = Auth::User();
            $agentProspects = $user->prospects()->get();
            return view('prospects.index', compact('agentProspects', 'user'));
        }
              
    }

    public function create()
    {
        $titles = Title::pluck('name', 'id')->all();
        $genders = Gender::pluck('name', 'id')->all();
        $first_uni_courses = Course::firstuni()->pluck('name', 'id');
        $second_uni_courses = Course::seconduni()->pluck('name', 'id');
        $universities = University::pluck('name', 'id')->all();
        return view('prospects.create', compact('titles', 'genders', 'first_uni_courses', 'second_uni_courses', 'universities'));

    }


    public function store()
    {
        if(Gate::allows('create')){

        }

    }

}
