<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VisitorController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm(): View
    {
        return view('visitor.register');
    }

    /**
     * Store a newly created visitor in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'school_name' => 'required|string|max:255',
                'class_level' => 'required|in:XI,XII,Alumni,Umum',
            ]);

            $visitor = Visitor::create($validated);

            // Set visitor ID in session
            $request->session()->put('visitor_id', $visitor->id);
            
            // Also set cookies for consistency with frontend
            $cookieExpiry = 60 * 24 * 30; // 30 days in minutes
            cookie()->queue('visitor_registered', 'true', $cookieExpiry);
            cookie()->queue('visitor_name', $validated['full_name'], $cookieExpiry);
            cookie()->queue('visitor_school', $validated['school_name'], $cookieExpiry);

            // Determine redirect URL - prioritize intended URL from session
            $intendedUrl = session('url.intended');

            if ($intendedUrl) {
                // Clear the intended URL from session
                session()->forget('url.intended');
                $redirectUrl = $intendedUrl;
            } else {
                // Fallback to redirect_to parameter
                $redirectTo = $request->input('redirect_to', 'homepage');

                // Map redirect_to values to actual routes
                $routeMap = [
                    'universities' => 'universities.index',
                    'favorites' => 'favorites.index',
                    'homepage' => 'homepage'
                ];

                $redirectRoute = $routeMap[$redirectTo] ?? 'homepage';
                $redirectUrl = route($redirectRoute);
            }

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Registrasi berhasil!',
                    'visitor' => $visitor,
                    'redirect_url' => $redirectUrl
                ]);
            }

            return redirect($redirectUrl)->with('success', 'Registrasi berhasil!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak valid',
                    'errors' => $e->errors()
                ], 422);
            }

            return back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            \Log::error('Visitor registration error: ' . $e->getMessage());

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan server. Silakan coba lagi.'
                ], 500);
            }

            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.')->withInput();
        }
    }
}
