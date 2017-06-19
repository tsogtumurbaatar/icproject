@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a" >
	<div class="container">
		<div class="row">

			<div class="container question" style="margin-top: 100px;">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					
					
					<div class="table-responsive">
						<table class="table table-condensed offset-top-20">

							<tr class="success" style="color:white;">

								<th  class="text-nowrap" style="text-align: center;">ID</th>
								<th  class="text-nowrap" style="text-align: center;">Name</th>
								<th  class="text-nowrap" style="text-align: center;">Email </th>
								<th  class="text-nowrap" style="text-align: center;">Type</th>
								<th  class="text-nowrap" style="text-align: center;">Access</th>
								<th class="text-nowrap" style="text-align: center;">Action</th>

							</tr>
							@foreach ($users as $myuser)
							<tr >
								<td>{{$myuser->id}}</td>
								<td>{{$myuser->name}}</td>
								<td>{{$myuser->email}}</td>
								<td>
									@if($myuser->user_type == '1')
									Administrator
									@else
									Normal user
									@endif
								</td>
								<td>
									@if($myuser->user_accept == '1')
									Allowed
									@else
									not allowed
									@endif
								</td>														
								<td class="text-nowrap">
									<form method="post" action="{{url('/usermakeadmin')}}">
									<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
									<input name="userid" type="hidden" value="{{ $myuser->id }}"/>
									<input type="submit" value="change type" class="pure-button pure-button-primary">
									</form>
									<form method="post" action="{{url('/userchangeaccess')}}">
									<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
									<input name="userid" type="hidden" value="{{ $myuser->id }}"/>
									<input type="submit" value="change access" class="pure-button pure-button-primary">
									</form>
									<form method="post" action="{{url('/userdeleteuser')}}">
									<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
									<input name="userid" type="hidden" value="{{ $myuser->id }}"/>
									<input type="submit" value="delete" class="pure-button pure-button-primary">
									</form>
								</td>
							</tr>
							@endforeach

						</table>
					</div>


				</div>

				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>

@endsection

