<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        $universityCount = University::count();
        return view('homepage', compact('universityCount'));
    }
}
