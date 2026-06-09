<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisits
{
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $request->is('admin*') ||
            $request->ajax() ||
            $request->is('api/*') ||
            $request->is('login') ||
            $request->method() !== 'GET'
        ) {
            return $next($request);
        }

        PageVisit::create([
            'url' => '/'.ltrim($request->path(), '/'),
            'full_url' => $request->fullUrl(),
            'referer' => $request->header('referer'),
            'ip' => substr(hash('sha256', $request->ip()), 0, 16),
            'user_agent' => $request->userAgent(),
            'visited_at' => now(),
        ]);

        return $next($request);
    }
}
