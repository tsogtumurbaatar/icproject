<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;

class cityController extends Controller
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
        $newcity =  City::create([
         'city_name' => $request['city_name'],
         'city_desc' => $request['city_desc'],
         'city_lat' => $request['city_lat'],
         'city_long' => $request['city_long']
         ]);


        $newcity->city_id = $newcity->id;


        return response()->json($newcity);
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
            'city_lat' => $request['city_lat'],
            'city_long' => $request['city_long']
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
