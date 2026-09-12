<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternController extends Controller
{
    public function internship()
    {
        $internship_position = internship_position::all();
        return view('internship',compact('$internship_position'));
    }
}
