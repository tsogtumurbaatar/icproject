@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a" ng-app="myApp" ng-controller="myCityController">
    <div class="container">
        <div class="row">

            <div class="container question" style="margin-top: 100px;">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="button" class="pure-button pure-button-primary" data-toggle="modal" data-target="#myModalCreate" ng-click="insertCityBefortCont()">Create New City</button>

                    <br><br>
                    <div>           
                        <span class="input-group">   
                            <input id="blog-sidebar-2-form-search-widget" type="text" name="s" ng-model="namefilter_city" autocomplete="off" class="form-search-input input-sm form-control input-sm" placeholder="search..." />
                            <span class="input-group-addon">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </span>  
                    </div>
                    <br>

                    <div class="table-responsive" style="overflow-x:auto;">
                        <table class="table table-condensed offset-top-20">

                            <tr class="success" style="color:white;">

                                <td  class="text-nowrap" ng-click="sort('city_id')">City ID <span class="glyphicon sort-icon" ng-show="sortkey=='city_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

                                <td  class="text-nowrap" ng-click="sort('city_name')" >City Name<span class="glyphicon sort-icon" ng-show="sortkey=='city_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>


                                <td  class="text-nowrap" ng-click="sort('city_desc')" >Description<span class="glyphicon sort-icon" ng-show="sortkey=='city_desc'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>

                                  <td  class="text-nowrap" ng-click="sort('city_lat')" >Latitude<span class="glyphicon sort-icon" ng-show="sortkey=='city_lat'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>


                                <td  class="text-nowrap" ng-click="sort('city_long')" >Longitude<span class="glyphicon sort-icon" ng-show="sortkey=='city_long'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></td>




                                <th >Action</th>

                            </tr>

                            <tr dir-paginate="city in cities | filter:namefilter_city | orderBy: sortkey : reverse |itemsPerPage:itemsPerPageVal" >

                                <td>@{{city.city_id}}</td>
                                <td>@{{city.city_name}}</td>
                                <td>@{{city.city_desc}}</td>
                                <td>@{{city.city_lat}}</td>
                                <td>@{{city.city_long}}</td>

                                <td class="text-nowrap">
                                    <span class="icon icon-xs fa fa-pencil-square-o text-primary" data-toggle="modal" data-target="#myModalEdit" style="cursor:pointer" ng-click="editCityCont(city, $index)"></span>&nbsp;&nbsp;
                                    <span class="icon icon-xs fa fa-times text-danger" ng-click="deleteCityCont(city)" style="cursor:pointer"></span>
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
                <h4 class="modal-title">Create New City</h4>
            </div>

            <form role="form" method="POST" ng-submit="insertCityCont()">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-4">
                            City Name
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="city_name" ng-model="new_city_name">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-4">
                            City description
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="city_desc" ng-model="new_city_desc">
                        </div>
                    </div><br>

                      <div class="row">
                        <div class="col-md-4">
                            Latitude
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="city_lat" ng-model="new_city_lat">
                        </div>
                    </div><br>

                      <div class="row">
                        <div class="col-md-4">
                            Longitude
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="city_long" ng-model="new_city_long">
                        </div>
                    </div><br>
                    
                    
                    <div class="row">
                        <div class="col-md-6 text-right">
                            <input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Add City">
                        </div>                      
                        <div class="col-md-6 text-left">
                            <button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
                        </div>

                        <div class="col-md-12 " ng-show="statusval=='success_newcity'">
                            <strong>Success!</strong> City info added
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
                <h4 class="modal-title">Edit City</h4>
            </div>

            <form role="form" method="POST" ng-submit="saveCityCont(row_index)">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-4">
                            City Name
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="city_name" ng-model="editcity.city_name">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-4">
                            City description
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="city_desc" ng-model="editcity.city_desc">
                        </div>
                    </div><br>

                     <div class="row">
                        <div class="col-md-4">
                            Latitude
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="city_lat" ng-model="editcity.city_lat">
                        </div>
                    </div><br>

                     <div class="row">
                        <div class="col-md-4">
                             Longitude
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="city_long" ng-model="editcity.city_long">
                        </div>
                    </div><br>
                    
                    
                    <div class="row">
                        <div class="col-md-6 text-right">
                            <input type="submit" name="add" class="pure-button pure-button-primary" id="addbook" value="Save City">
                        </div>                      
                        <div class="col-md-6 text-left">
                            <button type="button" class="pure-button pure-button-primary" data-dismiss="modal">Close</button>
                        </div>                  

                        <div class="col-md-12 " ng-show="statusval=='success_editcity'">
                            <strong>Success!</strong> City info saved
                        </div>

                    </div><br>                  
                </div>
            </form>
        </div>
    </div>
</div>



</div>

@endsection

