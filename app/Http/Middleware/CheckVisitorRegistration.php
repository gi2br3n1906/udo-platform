<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVisitorRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if visitor is registered in session or cookies
        $hasSession = session()->has('visitor_id');
        $hasCookie = $request->cookie('visitor_registered') === 'true';
        
        if (!$hasSession && !$hasCookie) {
            // Store the intended URL for redirect after registration
            session(['url.intended' => $request->fullUrl()]);

            // Determine redirect_to parameter based on current route
            $currentRoute = $request->route()->getName();
            $redirectTo = 'homepage'; // default

            if ($currentRoute === 'universities.index') {
                $redirectTo = 'universities';
            } elseif ($currentRoute === 'favorites.index') {
                $redirectTo = 'favorites';
            }

            // If AJAX request, return JSON response
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Silakan lengkapi data terlebih dahulu untuk mengakses fitur ini.',
                    'redirect' => route('homepage') . '?show_popup=1&redirect_to=' . $redirectTo
                ], 401);
            }

            // For normal request, redirect to homepage with message and popup trigger
            return redirect()->route('homepage')
                ->with('error', 'Silakan lengkapi data terlebih dahulu untuk mengakses fitur ini.')
                ->with('show_popup', true)
                ->with('redirect_to', $redirectTo);
        }

        return $next($request);
    }
}
