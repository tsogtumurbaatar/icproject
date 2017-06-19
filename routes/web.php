<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'welcomeController@index');

Route::get('/settings', function () { return view('settings'); })->middleware('auth');
Route::get('/city', function () { return view('city'); })->middleware('auth');
Route::get('/factor', function () { return view('factor'); })->middleware('auth');
Route::get('/segment', function () { return view('segment'); })->middleware('auth');
Route::get('/indicator', function () { return view('indicator'); })->middleware('auth');
Route::get('/datapoint', function () { return view('datapoint'); })->middleware('auth');
Route::get('/usermanage','userManageController@index')->middleware('auth');
Route::post('/usermakeadmin','userManageController@usermakeadmin')->middleware('auth');
Route::post('/userchangeaccess','userManageController@userchangeaccess')->middleware('auth');
Route::post('/userdeleteuser','userManageController@userdeleteuser')->middleware('auth');



Route::get('/calculate', 'datapointController@calculate');
Route::get('/resetdatapoints', 'datapointController@resetdatapoints');


Route::get('/createchart', 'chartController@createchart');
Route::post('/getsegments', 'chartController@getsegments');
Route::post('/chartjs', 'chartController@index');
Route::get('/chartdata', 'chartController@chartjs');

Route::get('/api/cities', 'cityController@index');
Route::post('/api/cities', 'cityController@store');
Route::post('/api/citiesdelete', 'cityController@deletecity');
Route::post('/api/citiesput', 'cityController@update');

Route::get('/api/factors', 'factorsController@index');
Route::post('/api/factors', 'factorsController@store');
Route::post('/api/factorsdelete', 'factorsController@deletefactor');
Route::post('/api/factorsput', 'factorsController@update');

Route::get('/api/segments', 'segmentController@index');
Route::post('/api/segmentsbyfactorid', 'segmentController@listbyid');
Route::post('/api/segments', 'segmentController@store');
Route::post('/api/segmentsdelete', 'segmentController@deletesegment');
Route::post('/api/segmentsput', 'segmentController@update');

Route::get('/api/indicators', 'indicatorController@index');
Route::post('/api/indicatorsbysegmentid', 'indicatorController@listbyid');
Route::post('/api/dictionbyindicatorid', 'dictionaryController@listbyid');
Route::post('/api/indicators', 'indicatorController@store');
Route::post('/api/indicatorsdelete', 'indicatorController@deleteindicator');
Route::post('/api/indicatorsput', 'indicatorController@update');
Route::post('/api/dictions', 'dictionaryController@store');

Route::get('/api/datapoints', 'datapointController@index');
Route::post('/api/datapoints', 'datapointController@store');
Route::post('/api/datapointsdelete', 'datapointController@deletedatapoint');
Route::post('/api/datapointsput', 'datapointController@update');


Route::get('/home', 'welcomeController@index');
Route::post('/home', 'HomeController@index1');
Route::get('/about', 'aboutController@about');

Route::get('/importExport', 'excelController@importExport');
Route::get('/downloadExcel/{type}', 'excelController@downloadExcel');
Route::post('/importExcel', 'excelController@importExcel');
Route::get('/pdfview/{segment_id}', array('as'=>'pdfview','uses'=>'chartController@pdfview'));

Auth::routes();
