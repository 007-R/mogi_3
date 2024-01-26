<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request, $guards) // $guardsを第二引数に追加
        );
    }
    protected function redirectTo($request, $guards)
    {
        if (!$request->expectsJson()) {
            // middlewareがauth:adminならroute('admin.login.form')にリダイレクトされる
            if (in_array('admins', $guards)) {
                return route('admin_return');
            }
            if (in_array('masters', $guards)) {
                return route('master_return');
            }
            // middlewareがauth:userならroute('user.login.form')にリダイレクトされる
            if (in_array('user', $guards)) {
                return route('user.login.form');
            }
        }
        /*if (!$request->routeIs('master.*')) {
            return route('master_return');
        }
        if (!$request->routeIs('admin.*')) {
            return route('admin_return');
        }
        if (! $request->expectsJson()) {
            return route('login');
        }*/

    }
}
