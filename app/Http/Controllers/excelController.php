<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\DataPoint;
use Excel;

class excelController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function downloadExcel($type)
    {
        $data = DataPoint::get()->toArray();
        return Excel::create('datapoint', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel()
    {
        if(Input::hasFile('import_file')){

            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                
                DB::table('datapoint')
                ->delete();

                foreach ($data as $key => $value) {
                    $insert[] = [
                    'data_id' => $value->data_id, 
                    'city_id' => $value->city_id,
                    'factor_id' => $value->factor_id, 
                    'segment_id' => $value->segment_id, 
                    'indicator_id' => $value->indicator_id,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                    'data_point' => $value->data_point,
                    'data_stat' => $value->data_stat
                    ];
                }
                if(!empty($insert)){
                    DB::table('datapoint')->insert($insert);
                    return view('datapoint');
                }
            }
        }
        return back();
    }

}
