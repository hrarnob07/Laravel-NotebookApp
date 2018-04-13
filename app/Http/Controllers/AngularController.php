<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngularController extends Controller
{
    public function angularDataStore(Request $request)
    {
    	return $request->all();
    }
}
