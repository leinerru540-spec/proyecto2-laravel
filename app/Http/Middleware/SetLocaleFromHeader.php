<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocaleFromHeader
{
    public function handle($request, Closure $next)
    {
        $locale = $request->header('Accept-Language', 'es');
        $locale = substr($locale, 0, 2);

        if (!in_array($locale, ['es', 'en'])) {
            $locale = 'es';
        }

        App::setLocale($locale);
        config(['app.locale' => $locale]); // ← Agrega esto

        return $next($request);
    }
}
