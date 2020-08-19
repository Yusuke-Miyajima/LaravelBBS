<?php

namespace App\Http\Controllers\Confirm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Request as PostRequest;

class ConfirmController extends Controller
{
	public function confirm(Request $request)
	{
		$user = Auth::user();
		$from_page = $request->session()->get('from_page');
		if ($from_page == 'post') {
			$message = "以下の内容で投稿します";
		}elseif ($from_page == 'update') {
			$message = "以下の内容で更新します";
		}elseif ($from_page == 'delete') {
			$message = "以下の投稿を削除しますか？";
		}
		$title = $request->session()->get('title');
		$text = $request->session()->get('text');

		return view('confirm.confirm', compact('user', 'message', 'title', 'text'));
	}

	public function btn_push(Request $request)
	{
		$user = Auth::user();
		$from_page = $request->session()->get('from_page');

		if (PostRequest::get('post')) {
			$title = $request->session()->get('title');
			$text = $request->session()->get('text');

			if ($from_page == 'post') {
				$param = [
					'posted_user_id' => Auth::id(),
					'title' => $title,
					'text' => $text,
				];
				DB::insert('insert into article (posted_user_id, title, text) values (:posted_user_id, :title, :text)', $param);

			}elseif ($from_page == 'update') {
				$param = [
					'title' => $title,
					'text' => $text,
					'selected_article_id' => $request->session()->get('selected_article_id')
				];
				DB::update('update article set title = :title, text = :text where id = :selected_article_id', $param);
			}elseif ($from_page =='delete') {
				$param = [
					'selected_article_id' => $request->session()->get('selected_article_id')
				];
				DB::update('update article set delete_flg = 1 where id = :selected_article_id', $param);
			}

			return redirect()->action('Complete\CompleteController@complete');

		}elseif (PostRequest::get('back')) {
			return redirect()->action('Index\IndexController@index');
		}
	}
}