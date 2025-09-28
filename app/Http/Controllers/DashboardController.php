<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Share university count with all views for navbar
        View::share('universityCount', University::count());
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $data = [
            'universityCount' => University::count(),
            'ptnCount' => University::where('type', 'PTN')->count(),
            'ptsCount' => University::where('type', 'PTS')->count(),
        ];

        return view('dashboard', $data);
    }
}
