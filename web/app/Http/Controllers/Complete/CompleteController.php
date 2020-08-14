<?php

namespace App\Http\Controllers\Complete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class CompleteController extends Controller
{
	public function complete()
	{
		return view("complete.complete");
	}
}
?>