<?php

namespace App\Http\Middleware;

use App\Models\Institution;
use App\Support\InstitutionContext;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCurrentInstitution
{
    public function handle(Request $request, Closure $next): Response
    {

         $institution = null;

    // 1. domain support (production style)
    $host = $request->getHost(); // tetu.college.test
    $subdomain = explode('.', $host)[0];

    // 2. query fallback (dev style)
    if ($request->has('institution')) {
        $subdomain = $request->input('institution');
    }

    $institution = Institution::where('slug', $subdomain)->first();

    if (!$institution) {
        abort(404, 'Institution not found');
    }

    app()->instance('currentInstitution', $institution);

    return $next($request);

    }
}
