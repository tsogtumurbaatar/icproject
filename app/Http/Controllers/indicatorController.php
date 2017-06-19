<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Indicator;

class indicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $my_array = DB::table('indicators')
       ->leftjoin('factors','indicators.factor_id','factors.factor_id')
       ->leftjoin('segments','indicators.segment_id','segments.segment_id')       
       ->select('indicators.*', 'factors.factor_name','segments.segment_name')
       ->orderBy('indicators.indicator_id')
       ->get();

       return \Response::json($my_array);
   }


   public function listbyid(Request $request)
    {
       $my_array = DB::table('indicators')
       ->where('segment_id', $request['segment_id']) 
       ->orderBy('indicators.indicator_id')
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
        $newsegment =  Indicator::create([
           'indicator_name' => $request['indicator_name'],
           'indicator_desc' => $request['indicator_desc'],
           'factor_id' => $request['factor_id'],
           'segment_id' => $request['segment_id']
           ]);


        $newsegment->indicator_id = $newsegment->id;
        
        $newsegment->factor_name = DB::table('factors')
        ->where('factor_id','=',$request['factor_id'])
        ->value('factor_name');

        $newsegment->segment_name = DB::table('segments')
        ->where('segment_id','=',$request['segment_id'])
        ->value('segment_name');       

        return response()->json($newsegment);
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
        DB::table('indicators')
        ->where('indicator_id', $request['indicator_id'])
        ->update([
            'indicator_name' => $request['indicator_name'],
            'indicator_desc' => $request['indicator_desc'],
            'factor_id' => $request['factor_id'],
            'segment_id' => $request['segment_id']
            ]);
        
         $newsegment = Indicator::where('indicator_id', $request['indicator_id'])->first();
         $newsegment->factor_name = DB::table('factors')
                             ->where('factor_id','=',$request['factor_id'])
                             ->value('factor_name');     
         $newsegment->segment_name = DB::table('segments')
                             ->where('segment_id','=',$request['segment_id'])
                             ->value('segment_name');     

        
         return response()->json($newsegment);
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

     public function deleteindicator(Request $request)
    {
        return Indicator::where('indicator_id',$request['indicator_id'])->delete();
    }
}
