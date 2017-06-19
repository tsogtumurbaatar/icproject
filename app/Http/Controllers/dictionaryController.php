<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dictionary;

class dictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_array = DB::table('cities')
        ->get();

        return \Response::json($my_array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function listbyid(Request $request)
    {
     $my_array = DB::table('diction_data')
     ->where('indicator_id', $request['indicator_id']) 
     ->first();

     return \Response::json($my_array);
 }


 public function create()
 {
        //
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $my_array = DB::table('diction_data')
        ->where('indicator_id', $request['indicator_id']) 
        ->first();

        if (is_null($my_array)) {
         $newcity =  Dictionary::create([
             'indicator_id' => $request['indicator_id'],
             'range1_min' => $request['range1_min'],
             'range1_max' => $request['range1_max'],
             'range2_min' => $request['range2_min'],
             'range2_max' => $request['range2_max'],
             'range3_min' => $request['range3_min'],
             'range3_max' => $request['range3_max'],
             'range4_min' => $request['range4_min'],
             'range4_max' => $request['range4_max'],
             'range5_min' => $request['range5_min'],
             'range5_max' => $request['range5_max']
             ]);
         $newcity->diction_id = $newcity->id;
         return response()->json($newcity);
     }
     else
     {    
         DB::table('diction_data')
         ->where('indicator_id',$request['indicator_id'])
         ->update([
           'range1_min' => $request['range1_min'],
             'range1_max' => $request['range1_max'],
             'range2_min' => $request['range2_min'],
             'range2_max' => $request['range2_max'],
             'range3_min' => $request['range3_min'],
             'range3_max' => $request['range3_max'],
             'range4_min' => $request['range4_min'],
             'range4_max' => $request['range4_max'],
             'range5_min' => $request['range5_min'],
             'range5_max' => $request['range5_max']
            ]);
         return response()->json($request);
     }


 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('cities')
        ->where('city_id',$request['city_id'])
        ->update([
            'city_name' => $request['city_name'],
            'city_desc' => $request['city_desc'],
            ]);
        
        
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deletecity(Request $request)
    {
        return City::where('city_id',$request['city_id'])->delete();
    }
}
