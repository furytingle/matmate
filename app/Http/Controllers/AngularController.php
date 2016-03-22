<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Part;

class AngularController extends Controller
{
    public function getParts()
    {
        $parts = Part::all();

        return response()->json($parts);
    }
}
