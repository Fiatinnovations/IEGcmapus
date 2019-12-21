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



                    {!! Form::model($prospect,[ 'method' => 'PUT', 'action' => ['ProspectController@ConditionalOffer', $prospect->slug]]) !!}
	                    	<div class="form-body">

	                    		<h4 class="form-section"><i class="ft-user"></i>Offer Admission</h4>                          
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Highest Qualification</label>
                                    <div class="col-md-9">
                                    {!! Form::select('admission_id', $admissions, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

								</div>

							<div class=" float-right" style="padding-bottom:20px;">
							<div>{!! Form::submit('Offer', ['class' => 'btn btn-primary']) !!}</div>

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
