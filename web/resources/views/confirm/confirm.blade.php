@extends('layout')

@section('content')
	<section id="confirm-section">
		<div class="confirm-area">
			<div class="error_message">
				<span style="color: red;">
					@if(isset($err))
					<?php
					echo $err;
					?>
					@endif
				</span>
			</div>

			<form action="./complete.blade.php" method="post">
				<div>
					<table>
						<tr>
							<td class="itemName"><div>Name</div></td>
							<td><div style="color: #ff9900"></div></td>
						</tr>
						<tr>
							<td class="itemName"><div>E-mail</div></td>
							<td><div style="color: #ff9900"></div></td>
						</tr>
						<tr>
							<td class="itemName"><div>Title</div></td>
							<td><div style="color: #ff9900"></div></td>
						</tr>
						<tr>
							<td class="itemName"><div>Text</div></td>
							<td><div style="color: #ff9900"></div></td>
						</tr>
					</table>
				</div>
				<div>
					<input class="button" type="button" name="Back" value="Back">
					<input class="button" type="submit" name="Submit" value="Post">
				</div>
			</form>
		</div>
	</section>
@endsection