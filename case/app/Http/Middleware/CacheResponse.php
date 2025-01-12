<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CacheResponse
{
    public function handle(Request $request, Closure $next)
    {
        $segments = explode('/', $request->route()->uri());
        $resource = $segments[1] ?? null;
        if (!$resource) return $next($request);
        $prefix = str_replace('.', ':', $resource);

        $accept_language = $request->header('Accept-Language');
        if (empty($accept_language)) {
            $accept_language = App::getLocale();
        } else if (preg_match('/[,;]/', $accept_language)) {
            $languages = array_map(function ($lang) {
                [$code, $quality] = array_pad(explode(';q=', $lang), 2, '1.0');
                return ['code' => trim($code), 'quality' => (float)$quality];
            }, explode(',', $accept_language));
            usort($languages, fn($a, $b) => $b['quality'] <=> $a['quality']);
            $language = $languages[0]['code'] ?? App::getLocale();
            if ($language && str_contains($language, '-')) {
                $accept_language = explode('-', $language)[0] ? trim(explode('-', $language)[0]) : App::getLocale();
            }
        } else {
            $accept_language = trim($accept_language);
        }

        $sep = '_';
        $cache_key = $prefix . $sep . $request->route()->getActionMethod();
        $param = $request->route(Arr::first($request->route()->parameterNames()));
        if (is_string($param) || is_numeric($param)) $cache_key = $cache_key . $sep . $param;

        if ($prefix === 'filter') {
            $cache_key = $prefix . $sep . md5($request->getRequestUri());
        }

        $cache_key = $cache_key . $sep . $accept_language;
        $cache_key = strtolower($cache_key);
        $cache_key = str_replace('-', '_', $cache_key);

        $get_from_cache = Cache::get($cache_key);
        if ($get_from_cache) return response()->json(json_decode($get_from_cache), Response::HTTP_OK);


        $response = $next($request);
        if ($response->status() < 400)
            Cache::put($cache_key, json_encode($response->original), 10 * 60); //10 minutes

        return $response;
    }
}
