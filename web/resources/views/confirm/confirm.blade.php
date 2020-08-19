@extends('layout')

@section('content')

	<section id="confirm-section">
		<div class="confirm-area">
			<div class="confirm_message">
				<p>
					<?php
					echo $message;
					?>
				</p>
			</div>

			<form action="/confirm" method="post">
				@csrf
				<div>
					<table>
						<tr>
							<th class="itemName">Title</th>
							<td>{{$title}}</td>
						</tr>
						<tr>
							<th class="itemName">Text</th>
							<td>{{$text}}</td>
						</tr>
					</table>
				</div>
				<div>
					<input class="button" type="submit" name="back" value="Back">
					<input class="button" type="submit" name="post" value="Post">
				</div>
			</form>
		</div>
	</section>
@endsection