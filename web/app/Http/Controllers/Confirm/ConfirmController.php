<?php

namespace App\Http\Controllers\Confirm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class ConfirmController extends Controller
{
	public function confirm()
	{
		return view("confirm.confirm");
	}
}
?>