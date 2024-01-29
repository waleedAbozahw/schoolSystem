<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        $data['x']=Student::count();
        return view('dashboard',$data);
    }
}
