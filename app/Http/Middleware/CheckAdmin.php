<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Acesso negado.');
        }
        return $next($request);
    }
}