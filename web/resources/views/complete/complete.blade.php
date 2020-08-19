@extends('layout')

@section('content')
	<section id="complete-section">
		<div class="complete-message container">
			<p>
				<?php
				echo $message
				?>
			</p>
			<form action="complete" method="post">
				@csrf
				<input class="button" type="submit" name="to_index" value="to index">
			</form>
		</div>
	</section>
@endsection