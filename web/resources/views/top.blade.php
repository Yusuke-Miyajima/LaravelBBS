@extends('layout')

@section('content')
	<section id="top-login-section">
		<div class="login-form-area">
			<p>Enter your Id and Password.</p>

			@if(isset($err))
			<div class="error_message">
				<span style="color: red;">
				<?php
				echo $err;
				?>
				</span>
			</div>
			@endif

			<form action="./top.blade.php" method="post">
				<p>
					<label class="itemNane">ID:</label> <input type="text" name="userID" value="">
				</p>
				<p>
					<label class="itemName">password:</label> <input type="password" name="password">
				</p>
				<div>
					<input class="button" type="submit" name="Login" value="Login">
				</div>
			</form>
		</div>
	</section>
@endsection