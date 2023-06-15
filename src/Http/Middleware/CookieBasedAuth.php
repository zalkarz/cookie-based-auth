<?php

namespace Zalkarz\CookieBasedAuth\Http\Middleware;

use Closure;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;

class CookieBasedAuth
{
    public function handle(Request $request, Closure $next)
    {
        $username = env('COOKIE_BASED_AUTH_USERNAME');
        $password = env('COOKIE_BASED_AUTH_PASSWORD');

        if (!$username || !$password) {
            return $next($request);
        }

        $basicUsername = $request->input('basic_username');
        $basicPassword = $request->input('basic_password');
        
        if ($basicUsername === $username && $basicPassword === $password) {
            $this->setEncryptedCookies($basicUsername, $basicPassword);
            return redirect($request->url());
        }
        
        try {
            $storedUsername = Crypt::decrypt(Arr::get($_COOKIE, 'basic_username'));
            $storedPassword = Crypt::decrypt(Arr::get($_COOKIE, 'basic_password'));

            if ($storedUsername === $username && $storedPassword === $password) {
                return $next($request);
            }
        } catch (DecryptException $e) {
            report($e);
        }

        return response(view('cookie-based-auth::cookie-based-auth-form'), 403);
    }

    private function setEncryptedCookies($username, $password): void
    {
        $encryptedUsername = Crypt::encrypt($username);
        $encryptedPassword = Crypt::encrypt($password);

        setcookie('basic_username', $encryptedUsername, 0, '/');
        setcookie('basic_password', $encryptedPassword, 0, '/');
    }
}