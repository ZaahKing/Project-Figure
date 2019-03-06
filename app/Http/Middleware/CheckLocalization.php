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

    private const SuportedLanguages = array (
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
            $sections = explode(';', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            foreach ($sections as $section) {
                $parts = explode(',', $section);
                foreach ($parts as $part) {
                    if ($part[0]=='q' && $part[1]=='=') continue;
                    if (isset(self::SuportedLanguages[$part])) {
                        $locale = $part;
                        break;
                    }
                    else {
                        if (strlen($part)>2){
                            $subPart = substr($part, 0, 2);
                            if (isset(self::SuportedLanguages[$subPart])) {
                                $locale = $subPart;
                                break;
                            }
                        }
                    }
                }
                if (isset($locale))        
                    break;
            }
        }

        //if accept change
        if(isset($locale)) \App::setLocale($locale);
        return $next($request);
    }
}
