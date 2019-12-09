@extends('layouts.master')

@section('content')


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3"></div>
            <div class="col-md-4 mb-3">
                    <div>
                            @if ($errors->any())
                        <div class="alert alert-danger">
                           <ul>
                                 @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                 @endforeach
                           </ul>
                     @endif
                     </div>
                    </div>	
            </div>
            <div class="col-md-4 mb-3"></div>
        </div>
    </div>
</section>


<section>
<div class="container">
    <div class="row">
        <div class="col-md-1 mb-3"></div>
        <div class="col-md-10 mb-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        
                        
                            
                {!! Form::open(['method' =>'PUT', 'action' => ['ProspectController@UpdateFirstUni', $prospect->id], 'files' => true]) !!}
                        <div class="form-body">
                        <h4 class="form-section"><i class="fa fa-university" aria-hidden="true"></i>{{$prospect->university['name']}} University Admission Form</h4>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Highest Qualification</label>
                                <div class="col-md-9">
                                {!! Form::select('qualification_id', $qualifications, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Choose a Course</label>
                                <div class="col-md-9">
                                    {!! Form::select('course_id', $first_uni_courses, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Work Experience</label>
                                <div class="col-md-9">
                                    {!! Form::text('experience', null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-md-3 label-control">Referee(s)</label>
                                    <div class="col-md-9">
                                        {!! Form::text('referee', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Passport Number</label>
                                <div class="col-md-9">
                                    {!! Form::text('passport', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control">Residence Address</label>
                                <div class="col-md-9">
                                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">Upload Certificate</label>
                                <div class="col-md-9">
                                   {!! Form::file('certificate', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            </div>
                        <div class=" float-right" style="padding-bottom:20px;">
                        <div >{!! Form::submit('Create Prospect', ['class' => 'btn btn-primary']) !!}</div>	
                        
                        </div>
               {!! Form::close() !!}

                                    
              

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 mb-3"></div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</section>
@endsection