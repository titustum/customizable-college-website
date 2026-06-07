<?php

namespace App\Http\Middleware;

use App\Support\InstitutionContext;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetInstitutionContext
{
    public function handle(Request $request, Closure $next): Response
    {
        $institutionId = $request->user()?->institution_id;

        InstitutionContext::set($institutionId);

        return $next($request);
    }
}
