<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use LDAP\Result;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Page;
use Illuminate\Support\Facades\Config;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $pageCount = Page::all()->count();
        // dd($pageCount);
        // config('adminlte.pages_dash', $pageCount);
        // Debugging
        // dd('Middleware executed.');
        // Obține user autentificat
        $user = Auth::user();
        // dd($user);  

        // Verifică dacă utilizatorul este autentificat și are rolul de 'admin'
        if (auth()->user() && auth()->user()->role === 'admin'){
            // Debugging
            // dd('Utilizatorul este administrator.');

            // Continuă procesarea daca user === admin
            return $next($request);
        }

        // Debugging
        // dd('Utilizatorul nu este administrator.');

        // Returnează un răspuns 403 daca user nu are rol admin
        return redirect()->route('home')->with('error', 'Nu aveți permisiunea necesară pentru a accesa Admin Panel.');
    }
}