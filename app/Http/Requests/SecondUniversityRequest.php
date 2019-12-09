<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SecondUniversityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'qualification_id' => 'required',
            'course_id' => 'required',
            'referee' => 'required',
            'transcript' => 'required',
            'dob' => 'required',
            'status_id' => 'required',
            'citizenship' => 'required',
        ];
    }
}
