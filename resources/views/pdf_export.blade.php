<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <link href="css/marketing.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="pure-u-lg-1-2 pure-u-md-1-1 pure-u-sm-1-1">
		<h3>About Innovation Cities Program</h3>
		<p>
		This program is designed to give you the data, training and tools turns your ideas into innovation where you are. Below are 5 roles commonly assumed by innovators. What role best describes your needs?
		</p>

		<h4>Create</h4>
		<p>
		"The Innovation Cities™ Program provides powerful tools for implementing your ideas in cities, business and organizations. All 2thinknow innovation services are designed to help create your innovation.
		</p>

		<h4>Compare</h4>
		<p>
		Start to compare city locations for innovation potential in general with the Index classifications. Select cities and indicators from the Comparative City Data-set.You can also start with the Innovation Cities™ Analysis Report, book a course or hire our analysts to consult via video.
		</p>

		<h4>Measure</h4>
		<p>
		Measure cities in detail with City benchmarking data for cities everywhere. This includes Single City Data-sets for your chosen or home city. Or Comparative City Data-sets for measuring many cities on selected indicators. Or ask us about the Innovation Course specializing in Metric Design.
		</p>

		<h4>Change</h4>
		<p>
		Use all program resources to renew and change cities over time. These include the Innovation Course for Business or for Cities. We also now provide Local innovation forum events for communities.
		</p>

		<h4>Reward</h4>
		<p>
		The annual Innovation Cities™ Indexes reward all classified cities with honors every year since 2007. Order Award Certificates and Award Trophies to showcase your civic pride and achievement for each year.
		</p>

		<br><br><br>
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
					
					<td style="text-align: center;">{{ $data_array[$indicator->indicator_id][$city->city_id][1] }} &nbsp;&nbsp; = &nbsp;&nbsp; {{ $data_array[$indicator->indicator_id][$city->city_id][0] }} </td>
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
		<p style="text-align: right;">Innovation Cities Project (<?php echo date('Y-m-d');?>)</p>
	</div>
</body>
</html>