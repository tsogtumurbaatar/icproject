@extends('layouts.app')

@section('content')

   <div class="container question" style="margin-top: 60px;">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			
			<div class="sub-title lead3">Quiz Type - @if($quiz_type == 1) quiz by verb @else quiz by meaning @endif <br>
			Difficulty Level - {{$verbs_count}} phrasal verbs <br>
			Number of Quiz - {{$quiz_count}} 
			</div>
			<hr>
			  {!! Form::open(['url'=>'result','class'=>'range']) !!}
			  <input type="hidden" name="quiz_count" value="{{$quiz_count}}">
			  <input type="hidden" name="verbs_count" value="{{$verbs_count}}">
			  <input type="hidden" name="quiz_type" value="{{$quiz_type}}"> 
			  <input type="hidden" name="verbs_ids" value="{{$verbs_ids}}">  
				
				@foreach($quizs as $k => $v)
				<div id='question{{$loop->index}}' class='cont col-md-12'>   
					@foreach ($v as $key => $value) 
					
					@if($loop->index == 0)
					<b> {{$k+1}}. {{$value}}</b>&nbsp; <span class="showexample text-muted" style="cursor: pointer;" id="show{{$loop->parent->index}}">(show example)</span>
					<span class="hideexample text-muted" id="hide{{$loop->parent->index}}" style="cursor: pointer; display: none">(hide example)</span>
					<br><br>
					@endif
					
					

					@if($loop->index == 1)
					<input type="radio" value="1" id='radio1_{{$k}}' name='radio{{$loop->parent->index}}'/>
					&nbsp;{{$value}}<br>
					@endif

					@if($loop->index == 2)
					<input type="radio" value="2" id='radio1_{{$k}}' name='radio{{$loop->parent->index}}'/>
					&nbsp;{{$value}}<br>
					@endif
					@if($loop->index == 3)
					<input type="radio" value="3" id='radio1_{{$k}}' name='radio{{$loop->parent->index}}'/>
					&nbsp;{{$value}}<br>
					@endif
					@if($loop->index == 4)
					<input type="radio" value="4" id='radio1_{{$k}}' name='radio{{$loop->parent->index}}'/>
					&nbsp;{{$value}}
					@endif     
					@if($loop->index == 5)
					<input type="hidden" value="{{$value}}" name='hidden{{$loop->parent->index}}'/>
					@endif
					@if($loop->index == 6)
					<br><br>

					
					<span id="hidetext{{$loop->parent->index}}" style="display: none;">{{$value}}</span>
					@endif     
					@endforeach
					<br><br>
										
						<div class="col-xs-6">
							@if(!$loop->first)
							<button id='pre{{$loop->index}}' class='previous btn btn-success' type='button' style="width:100px;">Previous</button><br><br>
							@endif
						</div>
						
						<div class="col-xs-6">
							@if($loop->last)
							<input type="submit" class="next btn btn-success" style="width:100px;" value="Finish"> 
							@else
							<button id='next{{$loop->index}}' class='next btn btn-success' type='button' style="width:100px;">Next</button><br><br>
							@endif

						</div>
				</div>

				@endforeach
			</form>

		</div>
		
		<div class="col-md-3"></div>
	</div>




	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>

	<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		$('#question'+0).removeClass('hide');

		$(document).on('click','.next',function(){
			element=$(this).attr('id');
			
			if(element.length == 5)
			last = parseInt(element.substr(element.length - 1));
			if(element.length == 6)
			last = parseInt(element.substr(element.length - 2));
		
			
			nex=last+1;
			$('#question'+last).addClass('hide');

			$('#question'+nex).removeClass('hide');
		});

		$(document).on('click','.previous',function(){
			element=$(this).attr('id');
			
			if(element.length == 4)
			last = parseInt(element.substr(element.length - 1));
			if(element.length == 5)
			last = parseInt(element.substr(element.length - 2));			
			


			pre=last-1;
			$('#question'+last).addClass('hide');

			$('#question'+pre).removeClass('hide');
		});

	</script>

	<script>
	$(document).on('click','.showexample',function(){
	element=$(this).attr('id');
		last = parseInt(element.substr(4));
		$('#hidetext'+last).show();
        $('#hide'+last).show();
        $('#show'+last).hide();
	});

	$(document).on('click','.hideexample',function(){
	element=$(this).attr('id');
		last = parseInt(element.substr(4));
        $('#hidetext'+last).hide();
        $('#hide'+last).hide();
        $('#show'+last).show();
	});
</script>

@endsection

