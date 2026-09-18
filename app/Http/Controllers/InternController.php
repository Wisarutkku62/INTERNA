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
        $datas = InternshipPosition::query();
        $keyword = $request->keyword;

        if ($keyword) {
        $datas->where(
            'iposition_name',
            'LIKE',
            '%' . $keyword . '%' 
            );
        }
        
        $internship_position = $datas->get();

        return view('application', compact('internship_position'));
    }
}
