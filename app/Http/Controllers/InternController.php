<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternshipPosition;

class InternController extends Controller
{
    public function index()
    {
        return view('index');
    } 
    public function internship()
    {   
        $internship_position = InternshipPosition::all();
        return view('internship',compact('internship_position'));
    }
}
