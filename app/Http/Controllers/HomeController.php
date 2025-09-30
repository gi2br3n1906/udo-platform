<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index(Request $request)
    {
        $universityCount = University::count();
        
        // Check if this is an AJAX request
        if ($request->ajax()) {
            // Return only the content part for AJAX
            return view('homepage', compact('universityCount'))->render();
        }
        
        return view('homepage', compact('universityCount'));
    }
}
