<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'sau-payment/success', // ICICI payment success callback
        'https://apply.sau.int/sau-payment/success', // External callback URL (if necessary)
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request URI is in the except array
        foreach ($this->except as $except) {
            if ($request->is($except)) {
                return $next($request); // Skip CSRF verification
            }
        }

        // Verify the CSRF token
        if (!$request->isMethod('get') && $request->session()->token() !== $request->input('_token')) {
            abort(403, 'CSRF token mismatch.');
        }

        return $next($request);
    }
}
