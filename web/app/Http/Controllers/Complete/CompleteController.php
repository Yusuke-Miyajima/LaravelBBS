<?php

namespace App\Http\Controllers\Complete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Request as PostRequest;

class CompleteController extends Controller
{
	public function complete(Request $request)
	{
		$user = Auth::user();
		$from_page = $request->session()->get('from_page');
		if ($from_page == 'post') {
			$message = "投稿が完了しました";
		}elseif ($from_page == 'update') {
			$message = "投稿内容を更新しました";
		}elseif ($from_page == 'delete') {
			$message = "記事を削除しました";
		}
		return view("complete.complete", compact('user', 'message'));
	}

	public function btn_push(Request $request)
	{
		if (PostRequest::get('to_index')) {
			$user = Auth::user();
			return redirect()->action('Index\IndexController@index', compact('user'));
		}
	}
}