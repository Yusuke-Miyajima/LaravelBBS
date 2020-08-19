@extends('layout')

@section('content')
	<section id="index-section">
		<div class="container">
			<div class="error_message">
				<span style="color: red;">
					@if(isset($err))
					<?php
					echo $err;
					?>
					@endif
				</span>
			</div>

			<form action="index" method="post">
				<table>
					@csrf
					<tr>
						<td>title:</td>
						<td><input type="text" name="title"></td>
					</tr>
					<tr>
						<td>text:</td>
						<td><textarea name="text"></textarea></td>
					</tr>
					<tr>
						<td><input class="button" type="submit" name="clear" value="clear"></td>
						<td><input class="button" type="submit" name="set_session" value="confirm"></td>
					</tr>
				</table>
			</form>
		</div>

		<hr>
		<div class="contents container mb-5">
			@foreach ($items as $item)
			@if($item->delete_flg == 0)
				<table class="table-bordered">
					<tr>
						<td colspan="2">{{$item->title}}</td>
					</tr>
					<tr>
						<td colspan="2">{{$item->text}}</td>
					</tr>
					<tr>
						<td>{{$item->posted_user_id}}</td>
						<td>{{$item->created_at}}</td>
					</tr>
					<tr>
						<td colspan="2">
							<form action="index" method="post">
								@csrf
								<input type="hidden" name="article_id" value="{{$item->id}}">
								<input class="button" type="submit" name="edit" value="edit">
							</form>
						</td>
					</tr>
				</table>
			@endif
			@endforeach
		</div>
	</section>
@endsection