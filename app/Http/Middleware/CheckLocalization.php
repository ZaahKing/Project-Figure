<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public const SuportedLanguages = array (
        'be' => 'Беларуская',
        'en' => 'English',
        'ru' => 'Русский'
    );

    public function handle($request, Closure $next)
    {
        $locale = null;
        if(\Auth::check()) $locale = \Auth::user()->locale;

        //if in base notset check browser
        if (!isset($locale)) {
            $sections = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            foreach ($sections as $section) {
                $parts = explode(';', $section);
                if (isset(self::SuportedLanguages[$parts[0]])) {
                    $locale = $parts[0];
                    break;
                }
            }
        }

        //if accept change
        if(isset($locale)) \App::setLocale($locale);
        return $next($request);
    }
}
