<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
	public function index(Request $request)
	{
		$user = Auth::user();
		if (isset($request->id)) {
			$param = ['id' => $request->id];
			$items = DB::select('select * from Article where id = :id', $param);
		}else{
			$items = DB::select('select * from article');
		}
		return view("index.index", ['items' => $items], ['user' => $user]);
	}

	public function clear()
	{
	}

	public function confirm(Request $request)
	{
		$param = [
			'posted_user_id' => $request->posted_user_id,
			'title' => $request->title,
			'text' => $request->text,
		];
		DB::insert('insert into article (posted_user_id, title, text) values (:posted_user_id, :title, :text)', $param);

		return redirect('index');
	}
}