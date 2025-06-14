<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PageVisit;
use Illuminate\Support\Facades\Auth;


class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log only GET requests to keep thing clear
        if ($request->isMethod('get')) {
            PageVisit::create([
                'url' => $request->path(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'user_id' => Auth::user()?->id ?? null,
                'referer' => $request->headers->get('referer'),
            ]);
        }

        return $next($request);
    }
}
