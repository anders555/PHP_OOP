<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckRegistrationDate
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
        $current = Carbon::now();
        $applyDate = $current->subDays(3);
        $user = User::query()->where('email', $request->input('email'))
            ->all();
        if($applyUser = $user->where('created_at', $applyDate){
            //ош
            Auth::login($applyUser);
        })
        return $next($request);
    }
}
