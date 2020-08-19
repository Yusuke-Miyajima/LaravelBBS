@extends('layout')

@section('content')
	<section id="edit-section">
		<div class="edit-area container">
			<p>Edit posted contents.</p>

			<div class="error_message">
			@if(isset($err))
				<span style="color: red;">
				<?php
				echo $err;
				?>
				</span>
			@endif
			</div>

			<div class="edit_content">
				<form action="/edit" method="post">
					<table>
						@csrf
						<input type="hidden" name="id" value="{{$selected_article_id}}">
						<tr>
							<th>title:</th>
							<td>
								<input type="text" name="title" value="{{$item[0]->title}}">
							</td>
						</tr>
						<tr>
							<th>text:</th>
							<td>
								<textarea name="text" name="text">{{$item[0]->text}}</textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input class="button" type="submit" name="back" value="Back">
							</td>
							<td>
								<input class="button" type="submit" name="submit" value="Submit">
							</td>
							<td>
								<input class="button" type="submit" name="delete" value="Delete">
							</td>
						</tr>
					</table>
				</form>
			</div>

		</div>
	</section>
@endsection