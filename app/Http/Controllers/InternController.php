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
    public function internship(Request $request)
    {   
        $keyword = $request->keyword;

        if ($keyword) {
            $internship_position = InternshipPosition::where(
                'iposition_name',
                'like',
                '%' . $keyword . '%'
            )->get();
            
        } else {
            $internship_position = [] ;
        }

        return view('internship', compact('internship_position', 'keyword'));
    }
}
