@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a" >
	<div class="container">
		<div class="row">

			<div class="container question" style="margin-top: 100px;">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					
						

						<div class="modal-body">
							<form role="form" method="POST" action="{{url('/getsegments')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-md-3">
									Factor Name :
								</div>
								<div class="col-md-7">

									<select class="form-control" name="factor">

										@foreach ($factors as $factor)
										<option value="{{ $factor->factor_id }}">{{ $factor->factor_name }}</option>
										@endforeach
									
									</select>

								</div>
								<div class="col-md-2">
									<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Fetch">
								</div>
							</div><br>
							</form>
							<form role="form" method="POST" action="{{ url('/chartjs')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-md-3">
									Segment Name :
								</div>
								<div class="col-md-7">

									<select class="form-control" name="segmentvalue">

										@foreach ($segments as $segment)
										<option value="{{ $segment->segment_id }}">{{ $segment->segment_name }}</option>
										@endforeach
									
									</select>

								</div>
								<div class="col-md-2">
									
								</div>
							</div><br>

						{{-- 	<div class="row">
								<div class="col-md-4">
									Indicators :
								</div>
								<div class="col-md-8">
									Selected segmentID - @{{segmentvalue}}
									<div ng-repeat="x in indicatorlist">@{{x.indicator_name}}</div>

								</div>
							</div><br> --}}

							<div class="row">
								<div class="col-md-12">
									<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Generate charts">
								</div>						
							</div>	
							<form>			
						</div>
				</div>

				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>

@endsection

