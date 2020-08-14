@extends('layout')

@section('content')
	<section id="edit-section">
		<div class="edit-area">
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
				<form action="./" method="post">
					<table>
						@csrf
						<input type="hidden" name="id" value="{{$item->id}}">
						<tr>
							<th>title:</th>
							<td>
								<input type="text" name="title" value={{$item->title}}>
							</td>
						</tr>
						<tr>
							<th>text:</th>
							<td>
								<textarea name="text" name="text" value={{$item->text}}></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input class="button" type="button" name="Back" value="Back">
							</td>
							<td>
								<input class="button" type="submit" name="Submit" value="Submit">
							</td>
						</tr>
					</table>
				</form>
			</div>

		</div>
	</section>
@endsection