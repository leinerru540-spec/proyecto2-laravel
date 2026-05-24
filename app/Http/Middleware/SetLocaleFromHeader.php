<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocaleFromHeader
{
    public function handle($request, Closure $next)
    {
        // Prioridad: sesión > header
        $locale = session('locale') ?? substr($request->header('Accept-Language', 'es'), 0, 2);

        if (!in_array($locale, ['es', 'en'])) {
            $locale = 'es';
        }

        App::setLocale($locale);
        config(['app.locale' => $locale]);

        return $next($request);
    }
}
