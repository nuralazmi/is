<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $header_language = $request->header('Accept-Language');
        $accept_language = $header_language && in_array($header_language, config('app.supported_locales')) ? $header_language :  \App\Enums\LanguagesEnum::TR->value;
        App::setLocale($accept_language);
        config()->set('language.id', App::getLocale() === \App\Enums\LanguagesEnum::TR->value ? \App\Enums\LanguageIdEnum::TR->value : \App\Enums\LanguageIdEnum::EN->value);

        return $next($request);
    }
}
