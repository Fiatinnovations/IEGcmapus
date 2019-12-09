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



                    {!! Form::open([ 'id'=>'myform', 'method' => 'Post', 'action' => 'ProspectController@store']) !!}
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
		                            	{!! Form::text('first_name', null, ['class'=>'form-control', 'id' => 'firstname']) !!}
		                            </div>
								</div>
								<div class="form-group row">
										<label class="col-md-3 label-control">Last Name</label>
										<div class="col-md-9">
											{!! Form::text('last_name', null, ['class'=>'form-control', 'id' => 'lastname']) !!}
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
							<div>{!! Form::submit('Create Prospect', ['class' => 'btn btn-primary']) !!}</div>

	                        </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 mb-3"></div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


<script>





</script>

</section>
@endsection
