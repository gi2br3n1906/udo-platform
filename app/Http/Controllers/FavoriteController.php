<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Visitor;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        // Get current visitor from session
        $visitorId = session('visitor_id');

        if (!$visitorId) {
            return redirect()->route('homepage')->with('error', 'Silakan registrasi terlebih dahulu');
        }

        $visitor = Visitor::find($visitorId);

        if (!$visitor) {
            return redirect()->route('homepage')->with('error', 'Data visitor tidak ditemukan');
        }

        // Get favorite universities
        $favoriteUniversities = $visitor->favoriteUniversities()->paginate(12);

        return view('favorites.index', compact('favoriteUniversities', 'visitor'));
    }

    public function toggle(Request $request)
    {
        $visitorId = session('visitor_id');
        $universityId = $request->input('university_id');

        if (!$visitorId || !$universityId) {
            return response()->json(['success' => false, 'message' => 'Data tidak valid']);
        }

        $visitor = Visitor::find($visitorId);
        $university = University::find($universityId);

        if (!$visitor || !$university) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }

        if ($visitor->hasFavorited($university)) {
            $visitor->favoriteUniversities()->detach($university->id);
            $isFavorited = false;
            $message = 'Universitas dihapus dari favorit';
        } else {
            $visitor->favoriteUniversities()->attach($university->id);
            $isFavorited = true;
            $message = 'Universitas ditambahkan ke favorit';
        }

        return response()->json([
            'success' => true,
            'is_favorited' => $isFavorited,
            'message' => $message
        ]);
    }
}
