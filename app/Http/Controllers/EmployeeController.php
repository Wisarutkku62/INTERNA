<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee');
    }

    public function fulltime()
    {
        return view('Fulltimejob');
    }

    public function parttime()
    {
        return view('parttime');
    }

    public function trainee()
    {
        return view('trainee');
    }

    public function train()
    {
        return view('train');
    }
    
}
