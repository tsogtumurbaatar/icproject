<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Segment;

class segmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $my_array = DB::table('segments')
       ->leftjoin('factors','segments.factor_id','factors.factor_id')
       ->select('segments.*', 'factors.factor_name')
       ->orderBy('segments.segment_id')
       ->get();

       return \Response::json($my_array);
   }

     public function listbyid(Request $request)
    {
       $my_array = DB::table('segments')
       ->where('factor_id', $request['factor_id']) 
       ->orderBy('segments.segment_id')
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
      $newsegment =  Segment::create([
         'segment_name' => $request['segment_name'],
         'segment_desc' => $request['segment_desc'],
         'factor_id' => $request['factor_id'],
         ]);


      $newsegment->segment_id = $newsegment->id;
      $newsegment->factor_name = DB::table('factors')
                            ->where('factor_id','=',$request['factor_id'])
                            ->value('factor_name');       

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
        DB::table('segments')
        ->where('segment_id', $request['segment_id'])
        ->update([
            'segment_name' => $request['segment_name'],
            'segment_desc' => $request['segment_desc'],
            'factor_id' => $request['factor_id'],
            ]);
        
         $newsegment = Segment::where('segment_id', $request['segment_id'])->first();
         $newsegment->factor_name = DB::table('factors')
                             ->where('factor_id','=',$request['factor_id'])
                             ->value('factor_name');      
        
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

     public function deletesegment(Request $request)
    {
        return Segment::where('segment_id',$request['segment_id'])->delete();
    }
}
