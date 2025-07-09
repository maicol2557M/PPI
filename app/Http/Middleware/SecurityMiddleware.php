<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class SecurityMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Solo aplicar rate limiting en rutas de autenticación
        if ($request->is('login') || $request->is('register')) {
            $key = 'auth:' . $request->ip();
            if (RateLimiter::tooManyAttempts($key, 5)) {
                return response()->json([
                    'error' => 'Demasiados intentos. Intenta de nuevo en 1 minuto.'
                ], 429);
            }
        }

        $response = $next($request);
        
        // Headers de seguridad básicos (más eficientes)
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        
        // Solo registrar actividad sospechosa en casos extremos
        if ($this->isSuspiciousActivity($request)) {
            Log::warning('Actividad sospechosa detectada', [
                'ip' => $request->ip(),
                'url' => $request->url(),
                'method' => $request->method()
            ]);
        }

        return $response;
    }

    /**
     * Detectar actividad sospechosa (simplificado)
     */
    private function isSuspiciousActivity(Request $request): bool
    {
        $userAgent = $request->userAgent();
        $url = $request->url();

        // Solo verificar patrones críticos
        $criticalPatterns = [
            '/<script/i',
            '/javascript:/i',
            '/union\s+select/i',
            '/drop\s+table/i'
        ];

        foreach ($criticalPatterns as $pattern) {
            if (preg_match($pattern, $url) || preg_match($pattern, $userAgent)) {
                return true;
            }
        }

        // Verificar User-Agent vacío
        return empty($userAgent);
    }
} 