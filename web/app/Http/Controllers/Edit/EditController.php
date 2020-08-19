<?php

namespace App\Http\Controllers\Edit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Request as PostRequest;

class EditController extends Controller
{
	public function edit(Request $request)
	{
		$user = Auth::user();
		$selected_article_id = $request->session()->get('selected_article_id');
		$param = ['selected_article_id' => $request->selected_article_id];
		$item = DB::select('select * from article where id = :selected_article_id', $param);

		return view('edit.edit', compact('user', 'selected_article_id', 'item'));
	}

	public function btn_push(Request $request)
	{
		$user = Auth::user();
		$request->session()->put('from_page', 'edit');
		if (PostRequest::get('submit')) {
			$title = $request->title;
			$text = $request->text;
			$request->session()->put('title', $title);
			$request->session()->put('text', $text);
			$request->session()->put(['from_page' => 'update']);

			return redirect()->action('Confirm\ConfirmController@confirm', compact('user', 'title', 'text'));

		}elseif (PostRequest::get('delete')) {
			$title = $request->title;
			$text = $request->text;
			$request->session()->put('title', $title);
			$request->session()->put('text', $text);
			$request->session()->put(['from_page' => 'delete']);

			return redirect()->action('Confirm\ConfirmController@confirm', compact('user', 'title', 'text'));

		}elseif (PostRequest::get('back')) {
			return redirect()->action('Index\IndexController@index', compact('user'));
		}
	}
}