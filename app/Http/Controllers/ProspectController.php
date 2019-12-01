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
use App\Http\Requests\ProspectStoreRequest;

class ProspectController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {

        if (Gate::allows('allProspects')) {
            $user = Auth::User();
            $prospects = Prospect::all();
            return view('prospects.index', compact('prospects', 'user'));
        } else {
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
        $first_uni_courses = Course::firstuni()->pluck('name', 'id')->all();
        $second_uni_courses = Course::seconduni()->pluck('name', 'id')->all();
        $third_uni_courses = Course::thirduni()->pluck('name', 'id')->all();
        $universities = University::pluck('name', 'id')->all();
        return view('prospects.create', compact('titles', 'genders', 'third_uni_courses', 'first_uni_courses', 'second_uni_courses', 'universities'));
    }


    public function store(ProspectStoreRequest $request)
    {
        if (Gate::allows('create')) {

            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $title_id = $request['title_id'];
            $gender_id = $request['gender_id'];
            $email = $request['email'];
            $university_id = $request['university_id'];
            $first  =  strtolower($first_name);
            $second = strtolower($last_name);
            $name = $first . '-' . $second;

            $prospect = new Prospect();
            $prospect->first_name = $first_name;
            $prospect->last_name = $last_name;
            $prospect->title_id = $title_id;
            $prospect->gender_id = $gender_id;
            $prospect->email = $email;
            $prospect->university_id = $university_id;
            $prospect->slug = $name;

            if ($request->user()->prospects()->save($prospect)) {
                return redirect()->route('home')->with(['message' => 'Prospect Created Successfully']);
            }
        }
    }
}
