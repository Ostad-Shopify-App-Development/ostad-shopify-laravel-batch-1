<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIController extends Controller
{
    function uiComponents(Request $request)
    {
        return view('ui.components');
    }
}
