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
							
							
								
                    {!! Form::open(['method' =>'POST', 'action' =>'ProspectController@store', 'files' => 'true']) !!}
	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="ft-user"></i>Create a Prospect</h4>
			                    <div class="form-group row">
	                            	<label class="col-md-3 label-control">Title</label>
		                            <div class="col-md-9">
		                            {!! Form::select('title_id', $titles, null, ['class' => 'form-control']) !!}
		                            </div>
		                        </div>
		                        <div class="form-group row">
	                            	<label class="col-md-3 label-control">Gender</label>
									<div class="col-md-9">
	                            		{!! Form::select('gender_id', $genders, null, ['class' => 'form-control']) !!}
	                            	</div>
		                        </div>
                                <div class="form-group row">
		                            <label class="col-md-3 label-control">First Name</label>
		                            <div class="col-md-9">
		                            	{!! Form::text('first_name', null, ['class'=>'form-control']) !!}
		                            </div>
								</div>
								<div class="form-group row">
										<label class="col-md-3 label-control">Last Name</label>
										<div class="col-md-9">
											{!! Form::text('last_name', null, ['class'=>'form-control']) !!}
										</div>
									</div>
		                        <div class="form-group row">
		                            <label class="col-md-3 label-control">E-mail</label>
		                            <div class="col-md-9">
		                            	{!! Form::email('email', null, ['class' => 'form-control']) !!}
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label class="col-md-3 label-control">University</label>
		                            <div class="col-md-9">
		                            	{!! Form::select('university_id', $universities, null, ['class' => 'form-control', 'placeholder' => 'Choose a University', 'id'=>'what_university']) !!}
		                            </div>
								</div>
								

								

								</div>



							<div class=" float-right" style="padding-bottom:20px;">
							<div onclick="getCourseId()">{!! Form::submit('Create Prospect', ['class' => 'btn btn-primary']) !!}</div>	
	                        
	                        </div>
	                    </form>
 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 mb-3"></div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $("#what_university").on("change", function(){
        switch ($(this).val()) {
            case "1":
                  $("#forFirst").show(); 
				  $("#forSecond").hide();
				  $("#cambridgecourses").removeAttr("required", "required");
				  $("#address").removeAttr("required", "required");
				  $("#transcript").removeAttr("required", "required");
				  $("#forThird").hide();
				  $("#coo").removeAttr("required", "required");
				  $("#coocourses").removeAttr("required", "required");				  
                break;
            case "2":
				  $("#forSecond").show();
				  $("#forFirst").hide();
				  $("#yalecourses").removeAttr("required", "required");
				  $("#dob").removeAttr("required", "required");
				  $("#certificate").removeAttr("required", "required");	
				  $('#forThird').show();
				  $('#forThird').hide();
				  $("#coo").removeAttr("required", "required");
				  $("#coocourses").removeAttr("required", "required");
                break;
            case "3":
				  $('#forThird').show();
				  $("#forSecond").hide();
				  $("#cambridgecourses").removeAttr("required", "required");
				  $("#address").removeAttr("required", "required");
				  $("#transcript").removeAttr("required", "required");
				  $("#forFirst").hide();
				  $("#yalecourses").removeAttr("required", "required");
				  $("#dob").removeAttr("required", "required");
				  $("#certificate").removeAttr("required", "required");
				  
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

<script>

function getCourseId(){
	var cambridgecourses = document.getElementById('cambridgecourses').val;
	var yalecourses = document.getElementById('yalecourses').val;
	console.log(cambridgecourses);
}

</script>

</section>
@endsection