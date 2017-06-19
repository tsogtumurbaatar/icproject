<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class userManageController extends Controller
{


	public function index()
	{
		$my_users = DB::table('users')
		->get();

		return view('usermanage',[
			'users' => $my_users
			]);
	}

	public function usermakeadmin(Request $request)
	{

		$user_type = DB::table('users')
		->where('id', $request['userid'])
		->value('user_type');

		if($user_type == '0')
		{
			DB::table('users')
			->where('id', $request['userid'])
			->update([
				'user_type' => '1'
				]);
		}
		else
		{
			DB::table('users')
			->where('id', $request['userid'])
			->update([
				'user_type' => '0'
				]);
		}	


		$my_users = DB::table('users')
		->get();

		return view('usermanage',[
			'users' => $my_users
			]);
	}

public function userchangeaccess(Request $request)
	{

		$user_type = DB::table('users')
		->where('id', $request['userid'])
		->value('user_accept');

		if($user_type == '0')
		{
			DB::table('users')
			->where('id', $request['userid'])
			->update([
				'user_accept' => '1'
				]);
		}
		else
		{
			DB::table('users')
			->where('id', $request['userid'])
			->update([
				'user_accept' => '0'
				]);
		}	


		$my_users = DB::table('users')
		->get();

		return view('usermanage',[
			'users' => $my_users
			]);
	}

	public function userdeleteuser(Request $request)
	{

		$my_users = DB::table('users')
		->where('id', $request['userid'])
		->delete();

		return view('usermanage',[
			'users' => $my_users
			]);
	}

}
