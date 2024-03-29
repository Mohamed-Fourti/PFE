<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MarkNotificationAsRead
{
    public function handle($request, Closure $next)
    {
        if($request->has('read')) {
            $notification = $request->user()->notifications()->where('id', $request->read)->first();
            if($notification) {
                $notification->markAsRead();
            }
        }
        return $next($request);
    }
}
