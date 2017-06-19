@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a" ng-app="myApp" ng-controller="myFactorController">
	<div class="container">
		<div class="row">

			<div class="container question" style="margin-top: 100px;">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<button type="button" class="pure-button pure-button-primary" data-toggle="modal" data-target="#myModalCreate"  ng-click="insertFactorBefortCont()">Create New Factor</button>

					<br><br>
					<div>			
						<span class="input-group">   
							<input id="blog-sidebar-2-form-search-widget" type="text" name="s" ng-model="namefilter_factor" autocomplete="off" class="form-search-input input-sm form-control input-sm" placeholder="search..." />
							<span class="input-group-addon">
								<i class="mdi mdi-magnify"></i>
							</span>
						</span>  
					</div>
					<br>

					<div class="table-responsive" style="overflow-x:auto;">
						<table class="table table-condensed offset-top-20">

							<tr class="success" style="color:white;">

								<td  class="text-nowrap" ng-click="sort('factor_id')">Factor ID <span class="glyphicon sort-icon" ng-show="sortkey=='factor_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

								<td  class="text-nowrap" ng-click="sort('factor_name')" >Factor Name<span class="glyphicon sort-icon" ng-show="sortkey=='factor_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>


								<td  class="text-nowrap" ng-click="sort('factor_desc')" >Description<span class="glyphicon sort-icon" ng-show="sortkey=='factor_desc'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>



								<th >Action</th>

							</tr>

							<tr dir-paginate="factor in factors | filter:namefilter_factor | orderBy: sortkey : reverse |itemsPerPage:itemsPerPageVal" >

								<td>@{{factor.factor_id}}</td>
								<td>@{{factor.factor_name}}</td>
								<td>@{{factor.factor_desc}}</td>

								<td class="text-nowrap">
									<span class="icon icon-xs fa fa-pencil-square-o text-primary" data-toggle="modal" data-target="#myModalEdit" style="cursor:pointer" ng-click="editFactorCont(factor, $index)"></span>&nbsp;&nbsp;
									<span class="icon icon-xs fa fa-times text-danger" ng-click="deleteFactorCont(factor)" style="cursor:pointer"></span>
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
				<h4 class="modal-title">Create New Factor</h4>
			</div>

			
			<form role="form" method="POST" ng-submit="insertFactorCont()">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					
					<div class="row">
						<div class="col-md-4">
							Factor Name
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="factor_name" ng-model="new_factor_name">
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Factor description
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="factor_desc" ng-model="new_factor_desc">
						</div>
					</div><br>
					
					
					<div class="row">
						<div class="col-md-6 text-right">
							<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Add Factor">
							
						</div>						
						<div class="col-md-6 text-left">
							<button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
						</div>

						<div class="col-md-12 " ng-show="statusval=='success_newfactor'">
							<strong>Success!</strong> Factor info added
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
				<h4 class="modal-title">Edit Factor</h4>
			</div>

			<form role="form" method="POST" ng-submit="saveFactorCont(row_index)">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					
					<div class="row">
						<div class="col-md-4">
							Factor Name
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="factor_name" ng-model="editfactor.factor_name">
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							Factor description
						</div>
						<div class="col-md-8">
							<input type="text"  class="form-control" id="factor_desc" ng-model="editfactor.factor_desc">
						</div>
					</div><br>
					
					
					<div class="row">
						<div class="col-md-6 text-right">
							<input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Save Factor">
						</div>						
						<div class="col-md-6 text-left">
							<button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
						</div>					

						<div class="col-md-12 " ng-show="statusval=='success_editfactor'">
							<strong>Success!</strong> Factor info saved
						</div>

					</div><br>					
				</div>
			</form>
		</div>
	</div>
</div>



</div>

@endsection

