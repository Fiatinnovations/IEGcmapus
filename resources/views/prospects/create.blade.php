@extends('layouts.master')

@section('content')


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-1 mb-3"></div>
            <div class="col-md-10 mb-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="ft-user"></i>Create a Prospect</h4>
			                    <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput1">Title</label>
		                            <div class="col-md-9">
		                            {!! Form::select('title_id', $titles, null, ['class' => 'form-control']) !!}
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control" for="projectinput2">Gender</label>
									<div class="col-md-9">
	                            		{!! Form::select('gender_id', $genders, null, ['class' => 'form-control']) !!}
	                            	</div>
		                        </div>
                                <div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput3">First Name</label>
		                            <div class="col-md-9">
		                            	{!! Form::text('first_name', null, ['class'=>'form-control']) !!}
		                            </div>
		                        </div>
		                        <div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
		                            <div class="col-md-9">
		                            	{!! Form::email('email', null, ['class' => 'form-control']) !!}
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput4">University</label>
		                            <div class="col-md-9">
		                            	{!! Form::select('university_id', $universities, null, ['class' => 'form-control', 'placeholder' => 'Choose a Univerity', 'id'=>'what_university']) !!}
		                            </div>
								</div>
								<div id="forFirst" style="display:none;">
								<div class="form-group row" >
		                            <label class="col-md-3 label-control" for="projectinput4">Courses</label>
		                            <div class="col-md-9">
		                            	{!! Form::select('course_id', $first_uni_courses, null, ['class' => 'form-control', 'placeholder' => 'Choose a Course']) !!}
		                            </div>
                                </div>

                                <div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput4">Date of Birth</label>
		                            <div class="col-md-9">
		                            	{!! Form::date('dob', null, ['class' => 'form-control']) !!}
		                            </div>
								</div>

								<div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput4">Adress</label>
		                            <div class="col-md-9">
		                            	{!! Form::text('address', null, ['class' => 'form-control']) !!}
		                            </div>
								</div>

								<div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput4">Adress</label>
		                            <div class="col-md-9">
		                            	{!! Form::file('certificate', ['class' => 'form-control']) !!}
		                            </div>
								</div>

								</div>

								<div id="forSecond" style="display:none;">
									<div class="form-group row" >
		                              <label class="col-md-3 label-control" for="projectinput4">Courses</label>
		                               <div class="col-md-9">
		                            	{!! Form::select('course_id', $second_uni_courses, null, ['class' => 'form-control', 'placeholder' => 'Choose a Course']) !!}
		                               </div>
								</div>
								
								<div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput4">Transcript</label>
		                            <div class="col-md-9">
		                            	{!! Form::file('transcript', ['class' => 'form-control']) !!}
		                            </div>
								</div>

								<div class="form-group row">
		                            <label class="col-md-3 label-control" for="projectinput4">Resume</label>
		                            <div class="col-md-9">
		                            	{!! Form::file('resume', ['class' => 'form-control']) !!}
		                            </div>
								</div>
								</div>


	                        <div class=" float-right" style="padding-bottom:20px;">
	                            <button type="submit" class="btn btn-primary">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
	                        </div>
	                    </form>
 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 mb-3"></div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $("#what_university").on("change", function(){
        switch ($(this).val()) {
            case "1":
                  $("#forFirst").show(); 
				  $("#forSecond").hide();    
                break;

            case "2":
				  $("#forSecond").show();
				  $("#forFirst").hide();	
                break;

            case "3":

                break;

            case "4":

                break;
        
            default:
				$("#forSecond").hide();
				$("#forFirst").hide();
                break;
        }
    })
</script>
@endsection
