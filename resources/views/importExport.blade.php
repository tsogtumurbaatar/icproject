@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a" style="margin-top: 100px;">
	<div class="container">
		Import datafile for the benchmarking
		<br><br>
		{!! Form::open(array('action' => 'excelController@importExcel', 'method' => 'post', 'files' => true)) !!}
			{!! Form::file('file', array('name' => 'import_file')) !!}
			<br>
		    {!! Form::submit('Import', array('class' => 'pure-button pure-button-primary')) !!}
		{!! Form::close() !!}
	</div>
</div>

@endsection