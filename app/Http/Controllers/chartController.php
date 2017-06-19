<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class chartController extends Controller
{
	

	public function index(Request $request)
	{
		$segment_id = $request['segmentvalue'];

		$segment_name = DB::table('segments')
		->where('segment_id',$segment_id)
		->value('segment_name');		

		$indicators = DB::table('indicators')
		->where('segment_id', $segment_id)
		->orderby('indicator_id')
		->get();

		

		$cities = DB::table('cities')
		->join(DB::raw('(select city_id from datapoint where segment_id = '.$segment_id.' group by city_id) as newtbl') , 'cities.city_id', '=', 'newtbl.city_id')
		->select('cities.*')
		->orderby('city_id')
		->get();

		$cities_full = DB::table('cities')
		->get();

		$indicators_full = DB::table('indicators')
		->get();

		$segments = DB::table('segments')
		->get();

		$factors = DB::table('factors')
		->get();

		$datapoints = DB::table('datapoint')
		->get();

		$data_array = array();
		foreach ($indicators as $indicator) {
			foreach ($cities as $city) {
				$data_array[$indicator->indicator_id][$city->city_id][0] = DB::table('datapoint')
				->where('datapoint.indicator_id','=',$indicator->indicator_id)
				->where('datapoint.city_id','=',$city->city_id)
				->value('data_stat');
				$data_array[$indicator->indicator_id][$city->city_id][1] = DB::table('datapoint')
				->where('datapoint.indicator_id','=',$indicator->indicator_id)
				->where('datapoint.city_id','=',$city->city_id)
				->value('data_point');

			}
		}

		$data_array_summary = array();
		foreach ($cities as $city) {
			$data_array_summary[$city->city_id] = DB::table('datapoint')
			->select(DB::raw('sum(data_stat) as user_count'))
			->where('city_id', '=', $city->city_id)
			->where('segment_id','=',$segment_id)
			->groupBy('city_id')
			->value('user_count');
		}



		return view('chartjs',[
			'segment_id' => $segment_id,
			'segment_name' => $segment_name,
			'segments' => $segments,
			'factors' => $factors,
			'datapoints' => $datapoints,
			'indicators' => $indicators,
			'indicators_full' => $indicators_full,
			'cities' => $cities,
			'cities_full' => $cities_full,
			'data_array' => $data_array,
			'data_array_summary' => $data_array_summary
			]);
	}

	public function createchart()
	{
		$factors = DB::table('factors')
		->get();

		$segments = DB::table('segments')
		->where('factor_id','200')
		->get();

		return view('createchart',[
			'factors' => $factors,
			'segments' => $segments
			]);

	}

	public function getsegments(Request $request)
	{
		
		$factors = DB::table('factors')
		->get();

		$segments = DB::table('segments')
		->where('factor_id',$request['factor'])
		->get();
		
		return view('createchart',[
			'factors' => $factors,
			'segments' => $segments
			]);

	}

	public function chartjs(Request $request)
	{
		$segment_id = $request['name'];

		$devlist = DB::table('datapoint')
		->leftjoin('cities','datapoint.city_id','cities.city_id')
		->select('datapoint.city_id','cities.city_name', DB::raw('sum(datapoint.data_stat) as summary'))
		->groupBy('datapoint.city_id')
		->where('datapoint.segment_id','=',$segment_id)
		->get();
		return $devlist;
	}

	public function pdfview($segment_id)
	{
		$segment_name = DB::table('segments')
			->where('segment_id', $segment_id)
			->value('segment_name');

		$cities = DB::table('cities')
			->join(DB::raw('(select city_id from datapoint where segment_id = '.$segment_id.' group by city_id) as newtbl') , 'cities.city_id', '=', 'newtbl.city_id')
			->select('cities.*')
			->orderby('city_id')
			->get();
			
		$indicators = DB::table('indicators')
			->where('segment_id', $segment_id)
			->orderby('indicator_id')
			->get();

		$data_array = array();
		foreach ($indicators as $indicator) {
			foreach ($cities as $city) {
				$data_array[$indicator->indicator_id][$city->city_id][0] = DB::table('datapoint')
				->where('datapoint.indicator_id','=',$indicator->indicator_id)
				->where('datapoint.city_id','=',$city->city_id)
				->value('data_stat');
				$data_array[$indicator->indicator_id][$city->city_id][1] = DB::table('datapoint')
				->where('datapoint.indicator_id','=',$indicator->indicator_id)
				->where('datapoint.city_id','=',$city->city_id)
				->value('data_point');

			}
		}	

		$data_array_summary = array();
		foreach ($cities as $city) {
			$data_array_summary[$city->city_id] = DB::table('datapoint')
			->select(DB::raw('sum(data_stat) as user_count'))
			->where('city_id', '=', $city->city_id)
			->where('segment_id','=',$segment_id)
			->groupBy('city_id')
			->value('user_count');
		}	


		$pdf = PDF::loadView('pdf_export', 
			[
				'segment_id'=>$segment_id,
				'segment_name' => $segment_name,
				'indicators' => $indicators,
				'data_array' => $data_array,
				'data_array_summary' => $data_array_summary,
				'cities' => $cities
			]);
		return $pdf->download('ICProject.pdf');
	}
}
