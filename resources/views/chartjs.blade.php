@extends('layouts.app')
@section('content')


<div class="pure-g stat">
	<div class="pure-u-lg-5-5 data-head pure-u-md-5-5 pure-u-sm-5-5">
		<p>System data</p>
	</div>
	<div class="pure-u-lg-1-5 pure-u-md-5-5 pure-u-sm-5-5">
		Total cities <p>{{$cities_full->count()}}</p>
	</div>
	<div class="pure-u-lg-1-5 pure-u-md-5-5 pure-u-sm-5-5">
		Total factors <p>{{$factors->count()}}</p>
	</div>
	<div class="pure-u-lg-1-5 pure-u-md-5-5 pure-u-sm-5-5">
		Total segments <p>{{$segments->count()}}</p>
	</div>
	<div class="pure-u-lg-1-5 pure-u-md-5-5 pure-u-sm-5-5"> 
		Total indicators <p>{{$indicators_full->count()}}</p>
	</div>
	<div class="pure-u-lg-1-5 last pure-u-md-5-5 pure-u-sm-5-5">  
		Total data points<p>{{$datapoints->count()}}</p>
	</div>

	<div class="pure-u-lg-5-5 data-head">
		<p>
			<b>Segment name : {{$segment_name}}</b>
			<a href="{!! route('pdfview', ['segment_id'=>$segment_id]) !!}" class="pure-button pure-button-primary ln" 
			style="float: right; text-decoration: none; color: white; font-weight: normal;">PDF</a>

			<a href="mailto:example@example.com?subject=Innovation Cities Project&body={{$segment_name}}" class="pure-button pure-button-primary ln"
			 style="float: right; text-decoration: none; color: white; font-weight: normal; margin-right: 5px; margin-bottom: 5px;">Email</a>
		</p>
	</div>
	<div class="benchmark">
		<div class="pure-u-lg-1-2 pure-u-md-1-1 pure-u-sm-1-1">
			<span>Geographic data</span>	
			<div id="map"></div>
		</div>


		<div class="pure-u-lg-1-2 pure-u-md-1-1 pure-u-sm-1-1">	
			<span>Line graph</span>		
			<canvas id="projects-graph2" class="ch"></canvas>
		</div>

		<div class="pure-u-lg-1-2 pure-u-md-1-1 pure-u-sm-1-1">
			<table class="table table-bordered table-hover table-condensed">
				<thead>
					<tr class="success">
						<th>{{$segment_name}}</th>
						@foreach ($cities as $city)
						<th style="text-align: center;">{{$city->city_name}}</th>
						@endforeach
					</tr>
				</thead>
				<tbody class="table-striped">
					@foreach ($indicators as $indicator)
					<tr>
						<td data-column="{{$indicator->indicator_name}}">{{$indicator->indicator_name}}</td>
						@foreach ($cities as $city)
						
						<td style="text-align: center;">{{ $data_array[$indicator->indicator_id][$city->city_id][1] }} &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp; {{ $data_array[$indicator->indicator_id][$city->city_id][0] }} </td>
						@endforeach
					</tr>
					@endforeach
					<tr>
						<td><b>Qualitative Summary</b></td>
						@foreach ($cities as $city)
						
						<td style="text-align: center;" data-column="{{ $data_array_summary[$city->city_id] }}">
							{{ $data_array_summary[$city->city_id] }}  
						</td>
						@endforeach
					</tr>
				</tbody>
			</table>
		</div>

		<div class="pure-u-lg-1-4 pure-u-md-5-5 pure-u-sm-5-5">
			<span>Bar graph</span>	
			<canvas id="projects-graph" class="ch"></canvas>
		</div>

		<div class="pure-u-lg-1-4 pure-u-md-5-5 pure-u-sm-5-5">
			<span>Radar graph</span>	
			<canvas id="projects-graph3" class="ch"></canvas>
		</div>	
	</div>		
</div>	


@endsection