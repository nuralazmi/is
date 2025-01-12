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
        $accept_language = $request->header('Accept-Language');

        if ($accept_language && in_array($accept_language, config('app.supported_locales'))) {
            App::setLocale($accept_language);
            config()->set('language.id', App::getLocale() === \App\Enums\LanguagesEnum::TR->value ? \App\Enums\LanguageIdEnum::TR->value : \App\Enums\LanguageIdEnum::EN->value);
        } else {
            $user = auth()->user();
            if ($user) App::setLocale($user->language_id);

            App::setLocale(\App\Enums\LanguagesEnum::TR->value);
        }

        return $next($request);
    }
}
