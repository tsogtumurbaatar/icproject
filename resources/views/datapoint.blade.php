@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a" ng-app="myApp" ng-controller="myDatapointController">
	<div class="container">
		<div class="row">

			<div class="container question" style="margin-top: 100px;">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-4">
							<button type="button" class="pure-button pure-button-primary" data-toggle="modal" data-target="#myModalCreate"  ng-click="insertDatapointBefortCont()">Create New Datapoint</button>
						</div>
						<div class="col-md-4">
							<form action="{{ url('/resetdatapoints') }}" method="get">
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
								<input type="submit" class="pure-button pure-button-primary" value="Clear Datapoint">
							</form>
						</div>
						<div class="col-md-4">
							<form action="{{ url('/calculate') }}" method="get">
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
								<input type="submit" class="pure-button pure-button-primary" value="Calculate Datapoint">
							</form>
						</div>
					
					</div>
					
					@if(isset($statusmessage))
						{{ $statusmessage }}
					@endif

					<br>
					<div>			
						<span class="input-group">   
							<input id="blog-sidebar-2-form-search-widget" type="text" name="s" ng-model="namefilter_datapoint" autocomplete="off" class="form-search-input input-sm form-control input-sm" placeholder="search..." />
							<span class="input-group-addon">
								<i class="mdi mdi-magnify"></i>
							</span>
						</span>  
					</div>
					<br>

					<div class="table-responsive" style="overflow-x:auto;">
						<table class="table table-condensed offset-top-20">

							<tr class="success" style="color:white;">

								<td  class="text-nowrap" ng-click="sort('data_id')">ID <span class="glyphicon sort-icon" ng-show="sortkey=='data_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<td  class="text-nowrap" ng-click="sort('city_name')" >City Name<span class="glyphicon sort-icon" ng-show="sortkey=='city_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>


								<td  class="text-nowrap" ng-click="sort('factor_name')" >Factor Name<span class="glyphicon sort-icon" ng-show="sortkey=='factor_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<td  class="text-nowrap" ng-click="sort('segment_name')" >Segment Name<span class="glyphicon sort-icon" ng-show="sortkey=='segment_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<td  class="text-nowrap" ng-click="sort('indicator_name')" >Indicator Name<span class="glyphicon sort-icon" ng-show="sortkey=='indicator_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<td  class="text-nowrap" ng-click="sort('data_point')" >Statistics Data<span class="glyphicon sort-icon" ng-show="sortkey=='data_point'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<td  class="text-nowrap" ng-click="sort('data_stat')" >Qualitative<span class="glyphicon sort-icon" ng-show="sortkey=='data_stat'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<th >Action</th>

							</tr>

							<tr dir-paginate="datapoint in datapoints | filter:namefilter_datapoint | orderBy: sortkey : reverse |itemsPerPage:itemsPerPageVal" >

								<td>@{{datapoint.data_id}}</td>							
								<td>@{{datapoint.city_name}}</td>
								<td>@{{datapoint.factor_name}}</td>
								<td>@{{datapoint.segment_name}}</td>
								<td>@{{datapoint.indicator_name}}</td>
								<td>@{{datapoint.data_point}}</td>
								<td>@{{datapoint.data_stat}}</td>
								
								<td class="text-nowrap">
									<span class="icon icon-xs fa fa-pencil-square-o text-primary" data-toggle="modal" data-target="#myModalEdit" style="cursor:pointer" 
									ng-click="editDatapointCont(datapoint, $index)"></span>&nbsp;&nbsp;
									<span class="icon icon-xs fa fa-times text-danger" ng-click="deleteDatapointCont(datapoint)" style="cursor:pointer"></span>
								</td>

							</tr>
						</table>
					</div>

					<br>
					<dir-pagination-controls
					max-size="10"
					direction-links="true"
					boundary-links="true" >
				</dir-pagination-controls>

			</div>
			
			<div class="col-md-1"></div>
		
		</div>
	</div>
</div>
<br><br>
<div id="myModalCreate" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">					
				<h4 class="modal-title">Create New Datapoint</h4>
			</div>

			
			<form role="form" method="POST" ng-submit="insertDatapointCont()">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					

					<div class="row">
						<div class="col-md-4">
							City Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="selectedCity" ng-options="x.city_name for x in citylist">
							</select>
							
						</div>
					</div><br>


					<div class="row">
						<div class="col-md-4">
							Factor Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="selectedFactor" ng-options="x.factor_name for x in factorlist" ng-change="insertDatapointAfterCont()">
							</select>
							
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Segment Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="selectedSegment" ng-options="x.segment_name for x in segmentlist"  ng-change="insertDatapointAfter2Cont()">
							</select>
							
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Indicator Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="selectedIndicator" ng-options="x.indicator_name for x in indicatorlist">
							</select>
							
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Data point
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="datapoint_name" ng-model="new_data_point">
						</div>
					</div><br>
					
					<div class="row">
						<div class="col-md-6 text-right">
							<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Add Datapoint">
							
						</div>						
						<div class="col-md-6 text-left">
							<button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
						</div>

						<div class="col-md-12 " ng-show="statusval=='success_newdatapoint'">
							<strong>Success!</strong> Datapoint info added
						</div>

					</div><br>					

				</div>
			</form>
		</div>
	</div>
</div>

<div id="myModalEdit" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">					
				<h4 class="modal-title">Edit Datapoint</h4>
			</div>

			<form role="form" method="POST" ng-submit="saveDatapointCont(row_index)">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					
					{{-- <div class="row">
						<div class="col-md-4">
							City Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="editCity" ng-options="x.city_name for x in citylist">
							</select>
							
						</div>
					</div><br>


					<div class="row">
						<div class="col-md-4">
							Factor Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="editFactor" ng-options="x.factor_name for x in factorlist" ng-change="editDatapointAfterCont()">
							</select>
							
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Segment Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="editSegment" ng-options="x.segment_name for x in segmentlist"  ng-change="editDatapointAfter2Cont()">
							</select>
							
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Indicator Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="editIndicator" ng-options="x.indicator_name for x in indicatorlist">
							</select>
							
						</div>
					</div><br>
 --}}
					<div class="row">
						<div class="col-md-4">
							Data point
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="datapoint_name" ng-model="editdatapoint.data_point">
						</div>
					</div><br>
					
					<div class="row">
						<div class="col-md-6 text-right">
							<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Save Datapoint">
							
						</div>						
						<div class="col-md-6 text-left">
							<button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
						</div>

						<div class="col-md-12 " ng-show="statusval=='success_editdatapoint'">
							<strong>Success!</strong> Datapoint info saved
						</div>

					</div><br>			

				</div>
			</form>
		</div>
	</div>
</div>



</div>

@endsection

