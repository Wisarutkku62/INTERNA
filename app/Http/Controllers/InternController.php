<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternshipPosition;
use Illuminate\Support\Facades\Auth;

class InternController extends Controller
{
    public function index()
    {   
        $user = Auth::user();

        return view('index', compact('user'));
    } 
    public function internship(Request $request)
    {   
        $query = InternshipPosition::query();
        $keyword = $request->keyword;

        if ($keyword) {
        $query->where(
            'position_name',
            'LIKE',
            '%' . $keyword . '%' 
            );
        }
        
        $internship_positions = $query->get();

        return view('application', compact('internship_positions' , 'keyword'));
    }

    public function internship_detail($id)
    {
    
    }
}
