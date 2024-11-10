<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin{
    public function handle($request, Closure $next){
        if(!Auth::user()->level == 'admin'){
            return response()->json([
                'message' => 'Unauthorized'],403);
        }
        return $next($request);
    }
}
