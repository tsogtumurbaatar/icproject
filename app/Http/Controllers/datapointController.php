<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataPoint;

class datapointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_array = DB::table('datapoint')
        ->leftjoin('factors','datapoint.factor_id','factors.factor_id')
        ->leftjoin('segments','datapoint.segment_id','segments.segment_id')       
        ->leftjoin('indicators','datapoint.indicator_id','indicators.indicator_id')       
        ->leftjoin('cities','datapoint.city_id','cities.city_id')       
        ->select('datapoint.*','indicators.indicator_name', 'factors.factor_name','segments.segment_name','cities.city_name')
        ->orderBy('datapoint.data_id')
        ->get();

        return \Response::json($my_array);
    }


 public function resetdatapoints()
    {
        DB::table('datapoint')
        ->delete();

       return view('datapoint',[
             'statusmessage' => 'Datapoint reset successful'
             ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calculate()
    {

        $datapoints = DB::table('datapoint')
        ->orderBy('data_id')
        ->get();

        $dictions = DB::table('diction_data')
        ->orderBy('id')
        ->get();

        foreach ($datapoints as $datapoint) {
            foreach ($dictions as $diction) {
                if($datapoint->indicator_id == $diction->indicator_id)
                {
                    if(($datapoint->data_point > $diction->range1_min) && ($datapoint->data_point <= $diction->range1_max))
                    {
                        DB::table('datapoint')->where('data_id', $datapoint->data_id)->update(['data_stat' => 1]);
                    }
                    elseif (($datapoint->data_point > $diction->range2_min) && ($datapoint->data_point <= $diction->range2_max))
                    {
                        DB::table('datapoint')->where('data_id', $datapoint->data_id)->update(['data_stat' => 2]);
                    }
                    elseif (($datapoint->data_point > $diction->range3_min) && ($datapoint->data_point <= $diction->range3_max))
                    {
                        DB::table('datapoint')->where('data_id', $datapoint->data_id)->update(['data_stat' => 3]);
                    }
                    elseif (($datapoint->data_point > $diction->range4_min) && ($datapoint->data_point <= $diction->range4_max))
                    {
                        DB::table('datapoint')->where('data_id', $datapoint->data_id)->update(['data_stat' => 4]);
                    }
                    elseif (($datapoint->data_point > $diction->range5_min) && ($datapoint->data_point <= $diction->range5_max))
                    {
                        DB::table('datapoint')->where('data_id', $datapoint->data_id)->update(['data_stat' => 5]);
                    }
                }
            }
        }

        return view('datapoint',[
             'statusmessage' => 'Calculation successful'
             ]);
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
     $newsegment =  DataPoint::create([
         'data_point' => $request['data_point'],
         'city_id' => $request['city_id'],
         'factor_id' => $request['factor_id'],
         'segment_id' => $request['segment_id'],
         'indicator_id' => $request['indicator_id']
         ]);


     $newsegment->data_id = $newsegment->id;

     $newsegment->factor_name = DB::table('factors')
     ->where('factor_id','=',$request['factor_id'])
     ->value('factor_name');

     $newsegment->segment_name = DB::table('segments')
     ->where('segment_id','=',$request['segment_id'])
     ->value('segment_name'); 

     $newsegment->indicator_name = DB::table('indicators')
     ->where('indicator_id','=',$request['indicator_id'])
     ->value('indicator_name');      

     $newsegment->city_name = DB::table('cities')
     ->where('city_id','=',$request['city_id'])
     ->value('city_name');       

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
        DB::table('datapoint')
        ->where('data_id', $request['data_id'])
        ->update([
            'data_point' => $request['data_point']
            // 'indicator_id' => $request['indicator_id'],
            // 'factor_id' => $request['factor_id'],
            // 'segment_id' => $request['segment_id'],
            // 'city_id' => $request['city_id']
            ]);
        
        $newsegment = DataPoint::where('data_id', $request['data_id'])->first();
        $newsegment->factor_name = DB::table('factors')
        ->where('factor_id','=',$request['factor_id'])
        ->value('factor_name');     
        $newsegment->segment_name = DB::table('segments')
        ->where('segment_id','=',$request['segment_id'])
        ->value('segment_name');
        $newsegment->indicator_name = DB::table('indicators')
        ->where('indicator_id','=',$request['indicator_id'])
        ->value('indicator_name');
        $newsegment->city_name = DB::table('cities')
        ->where('city_id','=',$request['city_id'])
        ->value('city_name');     

        
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

    public function deletedatapoint(Request $request)
    {
        return DataPoint::where('data_id',$request['data_id'])->delete();
    }
}
