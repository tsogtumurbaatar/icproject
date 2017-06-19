<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	
</head>
<body>

	{{-- {{dd($quizs)}}  --}}




	<div class="container question" style="margin-top: 60px;">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<p>
				200 common phrasal verbs List (www.englishclub.com)
			</p>
			<hr>
			  {!! Form::open(['url'=>'result','class'=>'range']) !!}
				
				@foreach($quizs as $k => $v)
				<div id='question{{$loop->index}}' class='cont col-md-12'>   
					@foreach ($v as $key => $value) 
					
					@if($loop->index == 0)
					<b> {{$k+1}}.{{$value}}</b>&nbsp; <span class="text-muted" style="cursor: pointer;" id="show">(show example)</span>
					<span class="text-muted" id="hide" style="cursor: pointer; display: none">(hide example)</span>
					<br><br>
					@endif

					@if($loop->index == 1)
					<input type="radio" value="1" id='radio1_{{$k}}' name='radio{{$loop->parent->index}}'/>
					{{$value}}<br>
					@endif
					@if($loop->index == 2)
					<input type="radio" value="2" id='radio1_{{$k}}' name='radio{{$loop->parent->index}}'/>
					{{$value}}<br>
					@endif
					@if($loop->index == 3)
					<input type="radio" value="3" id='radio1_{{$k}}' name='radio{{$loop->parent->index}}'/>
					{{$value}}<br>
					@endif
					@if($loop->index == 4)
					<input type="radio" value="4" id='radio1_{{$k}}' name='radio{{$loop->parent->index}}'/>
					{{$value}}
					@endif     
					@if($loop->index == 5)
					<input type="hidden" value="{{$value}}" name='hidden{{$loop->parent->index}}'/>
					@endif
					@if($loop->index == 6)
					<br><br>

					<span id="hidetext" style="display: none;">{{$value}}</span>
					@endif     
					@endforeach
					<br><br><br>
					
					<div class="row">
						<div class="col-md-6">
							@if(!$loop->first)
							<button id='pre{{$loop->index}}' class='previous btn btn-success' type='button' style="width:100px;">Previous</button>
							@endif
						</div>
						<div class="col-md-6">
							@if($loop->last)
							<input type="submit" class="next btn btn-success" style="width:100px;" value="Finish"> 
							@else
							<button id='next{{$loop->index}}' class='next btn btn-success' type='button' style="width:100px;">Next</button>
							@endif

						</div>

					</div>



				</div>
				@endforeach


			</form>
		</div>
		
		<div class="col-md-2"></div>
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
			last = parseInt(element.substr(element.length - 1));
			nex=last+1;
			$('#question'+last).addClass('hide');

			$('#question'+nex).removeClass('hide');
		});

		$(document).on('click','.previous',function(){
			element=$(this).attr('id');
			last = parseInt(element.substr(element.length - 1));
			pre=last-1;
			$('#question'+last).addClass('hide');

			$('#question'+pre).removeClass('hide');
		});

	</script>

	<script>
$(document).ready(function(){
    
    $("#hide").click(function(){
        $("#hidetext").hide();
        $("#hide").hide();
        $("#show").show();
    });
    $("#show").click(function(){
        $("#hidetext").show();
        $("#hide").show();
        $("#show").hide();
   
    });

   
});
</script>

</body>
</html>


