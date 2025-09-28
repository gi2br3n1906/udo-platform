<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Visitor;
use Illuminate\View\View;

class UniversityController extends Controller
{
    /**
     * Display the universities index page.
     */
    public function index(): View
    {
        $universities = University::all();

        // Get visitor data from session
        $visitor = null;
        if (session('visitor_id')) {
            $visitor = Visitor::with('favoriteUniversities')->find(session('visitor_id'));
        }

        return view('universities.index', compact('universities', 'visitor'));
    }    /**
     * Display a specific university by slug.
     */
    public function show(string $slug): View
    {
        // Find university by slug
        $university = University::where('slug', $slug)->firstOrFail();

        // Get current visitor if exists in session
        $visitor = null;
        $hasFavorited = false;

        if (session('visitor_id')) {
            $visitor = Visitor::find(session('visitor_id'));
            if ($visitor) {
                $hasFavorited = $visitor->hasFavorited($university);
            }
        }

        return view('universities.show', compact('university', 'visitor', 'hasFavorited'));
    }

    /**
     * Toggle favorite status for a university.
     */
    public function toggleFavorite(Request $request, string $slug)
    {
        // Find university by slug
        $university = University::where('slug', $slug)->firstOrFail();

        // Check if visitor is in session
        if (!session('visitor_id')) {
            return redirect()->route('visitor.register')
                ->with('error', 'Silakan daftar sebagai visitor terlebih dahulu untuk menambahkan favorit.');
        }

        // Get current visitor
        $visitor = Visitor::find(session('visitor_id'));

        if (!$visitor) {
            return redirect()->route('visitor.register')
                ->with('error', 'Session visitor tidak valid. Silakan daftar ulang.');
        }

        // Toggle favorite
        $visitor->toggleFavorite($university);

        // Determine message based on current status
        $isFavorited = $visitor->hasFavorited($university);
        $message = $isFavorited
            ? $university->name . ' berhasil ditambahkan ke favorit!'
            : $university->name . ' berhasil dihapus dari favorit!';

        return back()->with('success', $message);
    }

    /**
     * Get university data for API (modal).
     */
    public function getUniversityData(University $university)
    {
        // Get current visitor if exists in session
        $visitor = null;
        $isFavorited = false;

        if (session('visitor_id')) {
            $visitor = Visitor::find(session('visitor_id'));
            if ($visitor) {
                $isFavorited = $visitor->hasFavorited($university);
            }
        }

        return response()->json([
            'success' => true,
            'university' => [
                'id' => $university->id,
                'name' => $university->name,
                'slug' => $university->slug,
                'type' => $university->type,
                'category' => $university->category,
                'description' => $university->description,
                'booth_number' => $university->booth_number,
                'logo_url' => $university->logo_url,
                'is_favorited' => $isFavorited
            ]
        ]);
    }

    /**
     * Toggle favorite status by university ID.
     */
    public function toggleFavoriteById(Request $request, University $university)
    {
        // Check if visitor is in session
        if (!session('visitor_id')) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan daftar sebagai visitor terlebih dahulu.'
            ], 401);
        }

        // Get current visitor
        $visitor = Visitor::find(session('visitor_id'));

        if (!$visitor) {
            return response()->json([
                'success' => false,
                'message' => 'Session visitor tidak valid.'
            ], 401);
        }

        // Toggle favorite
        $visitor->toggleFavorite($university);

        // Get updated status
        $isFavorited = $visitor->hasFavorited($university);

        return response()->json([
            'success' => true,
            'is_favorited' => $isFavorited,
            'message' => $isFavorited 
                ? $university->name . ' berhasil ditambahkan ke favorit!'
                : $university->name . ' berhasil dihapus dari favorit!'
        ]);
    }
}
