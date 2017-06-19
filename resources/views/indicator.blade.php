@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a" ng-app="myApp" ng-controller="myIndicatorController">
	<div class="container">
		<div class="row">

			<div class="container question" style="margin-top: 100px;">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<button type="button" class="pure-button pure-button-primary" data-toggle="modal" data-target="#myModalCreate"  ng-click="insertIndicatorBefortCont()">Create New Indicator</button>

					<br><br>
					<div>			
						<span class="input-group">   
							<input id="blog-sidebar-2-form-search-widget" type="text" name="s" ng-model="namefilter_indicator" autocomplete="off" class="form-search-input input-sm form-control input-sm" placeholder="search..." />
							<span class="input-group-addon">
								<i class="mdi mdi-magnify"></i>
							</span>
						</span>  
					</div>
					<br>

					<div class="table-responsive" style="overflow-x:auto;">
						<table class="table table-condensed offset-top-20">

							<tr class="success" style="color:white;">

								<td  class="text-nowrap" ng-click="sort('indicator_id')">ID <span class="glyphicon sort-icon" ng-show="sortkey=='indicator_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<td  class="text-nowrap" ng-click="sort('indicator_name')" >Indicator Name<span class="glyphicon sort-icon" ng-show="sortkey=='indicator_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>


								<td  class="text-nowrap" ng-click="sort('factor_name')" >Factor<span class="glyphicon sort-icon" ng-show="sortkey=='factor_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<td  class="text-nowrap" ng-click="sort('segment_name')" >Segment<span class="glyphicon sort-icon" ng-show="sortkey=='segment_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<th >Action</th>

							</tr>

							<tr dir-paginate="indicator in indicators | filter:namefilter_indicator | orderBy: sortkey : reverse |itemsPerPage:itemsPerPageVal" >

								<td>@{{indicator.indicator_id}}</td>
								<td>@{{indicator.indicator_name}}</td>
								<td>@{{indicator.factor_name}}</td>
								<td>@{{indicator.segment_name}}</td>

								<td class="text-nowrap">
									<span class="icon icon-xs fa fa-bar-chart-o text-warning" data-toggle="modal" data-target="#myModalData" style="cursor:pointer" ng-click="dataIndicatorCont(indicator)"></span>&nbsp;&nbsp;
									<span class="icon icon-xs fa fa-pencil-square-o text-primary" data-toggle="modal" data-target="#myModalEdit" style="cursor:pointer" ng-click="editIndicatorCont(indicator, $index)"></span>&nbsp;&nbsp;
									<span class="icon icon-xs fa fa-times text-danger" ng-click="deleteIndicatorCont(indicator)" style="cursor:pointer"></span>
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

			<div class="col-md-2"></div>
		</div>
	</div>
</div>

<div id="myModalCreate" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">					
				<h4 class="modal-title">Create New Indicator</h4>
			</div>

			
			<form role="form" method="POST" ng-submit="insertIndicatorCont()">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					
					<div class="row">
						<div class="col-md-4">
							Indicator Name
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="indicator_name" ng-model="new_indicator_name">
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Indicator description
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="indicator_desc" ng-model="new_indicator_desc">
						</div>
					</div><br>
					
					<div class="row">
						<div class="col-md-4">
							Factor Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="selectedFactor" ng-options="x.factor_name for x in factorlist" ng-change="insertIndicatorAfterCont()">
							</select>
							
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Segment Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="selectedSegment" ng-options="x.segment_name for x in segmentlist">
							</select>
							
						</div>
					</div><br>

					
					<div class="row">
						<div class="col-md-6 text-right">
							<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Add Indicator">
							
						</div>						
						<div class="col-md-6 text-left">
							<button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
						</div>

						<div class="col-md-12 " ng-show="statusval=='success_newindicator'">
							<strong>Success!</strong> Indicator info added
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
				<h4 class="modal-title">Edit Indicator</h4>
			</div>

			<form role="form" method="POST" ng-submit="saveIndicatorCont(row_index)">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					
					<div class="row">
						<div class="col-md-4">
							Indicator Name
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="indicator_name" ng-model="editindicator.indicator_name">
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Indicator description
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="indicator_desc" ng-model="editindicator.indicator_desc">
						</div>
					</div><br>
					
					<div class="row">
						<div class="col-md-4">
							Factor Name
						</div>
						<div class="col-md-8">
							
							<select class="form-control" ng-model="editFactor" ng-options="x.factor_name for x in factorlist" ng-change="editIndicatorAfterCont()">
							</select>
							
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Segment Name
						</div>
						<div class="col-md-8">
							
						<select class="form-control" ng-model="editSegment" ng-options="x.segment_name for x in segmentlist">
							</select>
							
						</div>
					</div><br>
					
					<div class="row">
						<div class="col-md-6 text-right">
							<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Save indicator">
						</div>						
						<div class="col-md-6 text-left">
							<button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
						</div>					

						<div class="col-md-12 " ng-show="statusval=='success_editindicator'">
							<strong>Success!</strong> Indicator info saved
						</div>

					</div><br>					
				</div>
			</form>
		</div>
	</div>
</div>

<div id="myModalData" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">					
				<h4 class="modal-title">@{{indicator_name}}</h4>
			</div>

			<form role="form" method="POST" ng-submit="insertDictionCont()">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					
					
				<div class="row">
						<div class="col-md-4">
							<b>Minimum value</b>
						</div>
						
						<div class="col-md-4">
							 <b>Maximum value</b>
						</div>
						
						<div class="col-md-4">
							 <b>Data point</b>
						</div>

					</div>
					<hr>

					<div class="row">
						<div class="col-md-4">
							<input type="text"  class="form-control" id="indicator_name" ng-model="range1_min">
						</div>
						<div class="col-md-4">
							 <input type="text"  class="form-control" id="indicator_name" ng-model="range1_max">
						</div>	
						<div class="col-md-4">
							 ==> 1
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4">
							<input type="text"  class="form-control" id="indicator_name" ng-model="range2_min">
						</div>
						<div class="col-md-4">
							 <input type="text"  class="form-control" id="indicator_name" ng-model="range2_max">
						</div>	
						<div class="col-md-4">
							 ==> 2
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4">
							<input type="text"  class="form-control" id="indicator_name" ng-model="range3_min">
						</div>
						<div class="col-md-4">
							 <input type="text"  class="form-control" id="indicator_name" ng-model="range3_max">
						</div>	
						<div class="col-md-4">
							 ==> 3
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4">
							<input type="text"  class="form-control" id="indicator_name" ng-model="range4_min">
						</div>
						<div class="col-md-4">
							 <input type="text"  class="form-control" id="indicator_name" ng-model="range4_max">
						</div>	
						<div class="col-md-4">
							 ==> 4
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4">
							<input type="text"  class="form-control" id="indicator_name" ng-model="range5_min">
						</div>
						<div class="col-md-4">
							 <input type="text"  class="form-control" id="indicator_name" ng-model="range5_max">
						</div>	
						<div class="col-md-4">
							 ==> 5
						</div>
					</div><br>

					
					
					<div class="row">
						<div class="col-md-6 text-right">
							<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Save dictionary data">
						</div>						
						<div class="col-md-6 text-left">
							<button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
						</div>					

						<div class="col-md-12 " ng-show="statusval=='success_newdiction'">
							<strong>Success!</strong> Dictionary info saved
						</div>

					</div><br>					
				</div>
			</form>
		</div>
	</div>
</div>



</div>

@endsection

