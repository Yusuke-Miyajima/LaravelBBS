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
						<td><input type="hidden" name="title" value="test_title1"></td>
						<td><input type="hidden" name="posted_user_id" value="1"></td>
					</tr>
					<tr>
						<td>text:</td>
						<td><input type="hidden" name="text" value="test_text1"></td>
					</tr>
					<tr>
						<td><input class="button" type="submit" name="clear" value="clear"></td>
						<td><input class="button" type="submit" name="confirm" value="confirm"></td>
					</tr>
				</table>
			</form>
		</div>

		<hr>
		<div class="contents container">
			@foreach ($items as $item)
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
							<input class="button" type="submit" name="edit" value="edit">
						</td>
					</tr>
				</table>
			@endforeach
		</div>
	</section>
@endsection