<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisits
{
    private const EXCLUDED_EXTENSIONS = [
        'js', 'css', 'png', 'jpg', 'jpeg', 'gif', 'svg', 'ico',
        'woff', 'woff2', 'ttf', 'eot', 'otf', 'webp', 'avif', 'map',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        if ($this->shouldExclude($request)) {
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

    private function shouldExclude(Request $request): bool
    {
        if (
            $request->is('admin*') ||
            $request->ajax() ||
            $request->is('api/*') ||
            $request->is('login') ||
            $request->method() !== 'GET'
        ) {
            return true;
        }

        $path = $request->path();

        if (str_starts_with($path, 'livewire-')) {
            return true;
        }

        if (str_starts_with($path, '.well-known')) {
            return true;
        }

        if ($this->hasExcludedExtension($path)) {
            return true;
        }

        return false;
    }

    private function hasExcludedExtension(string $path): bool
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return in_array($extension, self::EXCLUDED_EXTENSIONS, true);
    }
}
