<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function evaluation()
    {
        return view ('evaluation.profile');
    }
    public function saveEvaluation(Request $request)
    {
    // เดี๋ยวค่อยเขียนบันทึก DB
    }
}
