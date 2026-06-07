<?php

namespace App\Http\Middleware;

use App\Models\Institution;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCurrentInstitution
{
    public function handle(Request $request, Closure $next): Response
    {

        $institution = null;

        // 1. Try subdomain first (tetu.college.test → tetu)
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0] ?? null;

        if ($subdomain) {
            $institution = Institution::where('slug', $subdomain)->first();
        }

        // 2. Fallback: first institution in DB (safe default)
        if (! $institution) {
            $institution = Institution::first();
        }

        // 3. If STILL nothing exists → system not initialized
        if (! $institution) {
            abort(500, 'No institution found. Please seed at least one institution.');
        }

        // 4. Share globally in app container
        app()->instance('currentInstitution', $institution);

        // Optional: share with views
        view()->share('currentInstitution', $institution);

        return $next($request);

    }
}
