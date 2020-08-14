<?php

namespace App\Http\Controllers\Edit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class EditController extends Controller
{
	public function edit()
	{
		return view("edit.edit");
	}
}
?>