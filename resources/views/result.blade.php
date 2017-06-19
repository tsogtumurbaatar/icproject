@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a">
	<div class="container">
		<div class="row">

			<div class="container question" style="margin-top: 60px;">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					
					Quiz Type - @if($quiz_type == 1) quiz by verb @else quiz by meaning @endif <br>
					Difficulty Level - {{$verbs_count}} phrasal verbs <br>
					Number of Quiz - {{$quiz_count}} 
					<hr>

					{{-- {!! nl2br(e($string)) !!} --}}
					{!! $string !!}

					<br><br>
					({{$counter}} of {{$quiz_count}})
					<br><br>

					<a href="{{url('/')}}" class="btn btn-success" style="width:100px;"> Start again </a>

				@if(Auth::check())
				<br><br> Your result recorded in your dashboard
				@endif
				</div>

				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</div>

@endsection

