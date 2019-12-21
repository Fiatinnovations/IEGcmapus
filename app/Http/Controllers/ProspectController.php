<?php

namespace App\Http\Controllers;

use App\User;
use App\Prospect;
use App\Title;
use App\Gender;
use App\Course;
use App\Http\Requests\FirstUniversityRequest;
use App\University;
use App\status;
use App\qualification;
use App\Admission;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\ProspectStoreRequest;
use App\Http\Requests\SecondUniversityRequest;
use App\Policies\ProspectPolicy;
use Illuminate\Support\Facades\Input;

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
        $universities = University::pluck('name', 'id')->all();
        return view('prospects.create', compact('titles', 'genders', 'third_uni_courses',  'universities'));
    }


    public function store(ProspectStoreRequest $request, Prospect $prospet)
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

            switch ($prospect->university_id) {
                case '1':

                    if ($request->user()->prospects()->save($prospect)) {
                        return redirect()->route('firstUni', $prospect->slug)->with(['message' => 'Prospect Created Successfully']);
                    }
                    break;
                case '2':

                    if ($request->user()->prospects()->save($prospect)) {
                        return redirect()->route('secondUni', $prospect->slug)->with(['message' => 'Prospect Created Successfully']);
                    }
                    break;

                default:
                    break;
            }
        }
    }



    public function ShowFirstUniversity(Request $request, $slug)
    {
        $qualifications = qualification::pluck('name', 'id')->all();
        $first_uni_courses = Course::firstuni()->pluck('name', 'id')->all();
        $prospect = Prospect::where('slug', $slug)->first();
        return view('prospects.universityform', compact('prospect', 'qualifications', 'first_uni_courses'));
    }

    public function UpdateFirstUni(FirstUniversityRequest $request, $id)
    {


        if ($request->hasFile('certificate')) {
            $allowedFileExtension = ['pdf', 'jpg', 'doc', 'docx'];
            $file = $request->file('certificate');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedFileExtension);

            if ($check) {
                $file->move('public/uploads/certificates', $filename);
                $prospect = Prospect::findOrFail($id);
                $prospect->update([
                    'qualification_id' => $request->input('qualification_id'),
                    'status_id' => $request->input('status_id'),
                    'citizenship' => $request->input('citizenship'),
                    'course_id' => $request->input('course_id'),
                    'experience' => $request->input('experience'),
                    'referee' => $request->input('referee'),
                    'address' => $request->input('address'),
                    'passport' => $request->input('passport')
                ]);

                $prospect->certificate = $filename;
                $prospect->save();
                return redirect()->route('home');
            }
        }
    }


    public function ShowSecondUniversity(Request $request, $slug)
    {
        $qualifications = qualification::pluck('name', 'id')->all();
        $second_uni_courses = Course::seconduni()->pluck('name', 'id')->all();
        $status = status::pluck('name', 'id')->all();
        $prospect = Prospect::where('slug', $slug)->first();
        return view('prospects.otheruniversityform', compact('prospect', 'qualifications', 'status', 'second_uni_courses'));
    }



    public function UpdateSecondUni(SecondUniversityRequest $request, $id)
    {
        if ($request->hasFile('transcript')) {
            $allowedFileExtension = ['jpg', 'pdf', 'doc', 'docx'];
            $file = $request->file('transcript');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedFileExtension);

            if ($check) {
                $file->move('public/uploads/transcripts', $filename);
                $prospect = Prospect::findOrFail($id);
                $prospect->update([
                    'qualification_id' => $request->input('qualification_id'),
                    'course_id' => $request->input('course_id'),
                    'referee' => $request->input('referee'),
                    'status_id' => $request->input('status_id'),
                    'citizenship' => $request->input('citizenship'),
                    'dob' => $request->input('dob'),
                ]);

                $prospect->transcript = $filename;
                $prospect->save();
                return redirect()->route('home');
            }
        }
    }

    public function ViewProspect($slug)
    {
        $prospect = Prospect::where('slug', $slug)->first();
        return view('prospects.show', compact('prospect'));
    }

    public function DeleteProspect($slug)
    {
        $prospect = Prospect::where('slug', $slug)->first();
        $prospect->delete();
        return redirect()->route('allProspects')->with(['message' => 'Prospect deleted Successfully']);
    }



    public function ShowProspect($slug)
    {

        $titles = Title::pluck('name', 'id')->all();
        $genders = Gender::pluck('name', 'id')->all();
        $universities = University::pluck('name', 'id')->all();
        $qualifications = qualification::pluck('name', 'id')->all();
        $first_uni_courses = Course::firstuni()->pluck('name', 'id')->all();
        $second_uni_courses = Course::seconduni()->pluck('name', 'id')->all();
        $status = status::pluck('name', 'id')->all();
        $prospect = Prospect::where('slug', $slug)->first();
        return view('prospects.update', compact('prospect', 'titles', 'genders', 'universities', 'qualifications', 'first_uni_courses', 'second_uni_courses', 'status'));
    }

    public function UpdateProspect(Request $request, $slug)
    {
        /***
        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $email = Input::get('email');
        $title_id = Input::get('title_id');
        $gender_id = Input::get('gender_id');
        $university_id = Input::get('university_id');
        $qualification_id = Input::get('qualification_id');
        $course_id = Input::get('course_id');
        $status_id = Input::get('status_id');
        $citizenship = Input::get('citizenship');
        $experience = Input::get('experience');
        $referee = Input::get('referee');
        $certificate = Input::get('certificate');
        $passport = Input::get('passport');
        $address = Input::get('address');
        $transcript = Input::get('transcript');
        $dob = Input::get('dob');***/

        $prospect = Prospect::where('slug', $slug)->first();

        $prospect->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'title_id' => $request->input('title_id'),
            'gender_id' => $request->input('gender_id'),
            'university_id' => $request->input('university_id'),
            'qualification_id' => $request->input('qualification_id'),
            'course_id' => $request->input('course_id'),
            'status_id' => $request->input('status_id'),
            'citizenship' => $request->input('citizenship'),
            'experience' => $request->input('experience'),
            'referee' => $request->input('referee'),
            'certificate' => $request->input('certificate'),
            'passport' => $request->input('passport'),
            'address' => $request->input('address'),
            'transcript' => $request->input('transcript'),
            'dob' => $request->input('dob'),
        ]);
    }

    public function ShowOffer($slug)
    {
        $prospect = Prospect::where('slug', $slug)->first();
        $admissions = Admission::pluck('name', 'id')->all();
        return view('iegcampus.updateprospect', compact('prospect', 'admissions'));
    }

    public function ConditionalOffer(Request $request, $slug)
    {
        $prospect = Prospect::where('slug', $slug)->first();
        $prospect->update([
            'admission_id' => $request->input('admission_id')
        ]);

        switch ($prospect->admission_id) {
            case '1':
            return redirect()->route('allProspects')->with(['message' => 'Admission status is pending']);  
                break;
            case '2':
            return redirect()->route('allProspects')->with(['message' => 'Conditional Admission offered to Prospect']);
                break;
             case '3':
            return redirect()->route('allProspects')->with(['message' => 'Admission offered to Prospect']);  
                break;
            
            default:
                # code...
                break;
        }
        if($prospect->Conditional){
            
        }else{
               
        }
        
    }
}
