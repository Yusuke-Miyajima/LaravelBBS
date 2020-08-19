<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Request as PostRequest;

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

	public function btn_push(Request $request)
	{
		$user = Auth::user();

		if (PostRequest::get('set_session')) {
			$title = $request->title;
			$text = $request->text;
			$request->session()->put('title', $title);
			$request->session()->put('text', $text);
			$request->session()->put(['from_page' => 'post']);

			return redirect()->action('Confirm\ConfirmController@confirm', compact('user', 'title', 'text'));

		}elseif (PostRequest::get('clear')) {
			return redirect('index');

		}elseif (PostRequest::get('edit')) {
			$selected_article_id  = $request->article_id;
			$request->session()->put('selected_article_id', $selected_article_id);

			return redirect()->action('Edit\EditController@edit', compact('user', 'selected_article_id'));
		}
	}
}