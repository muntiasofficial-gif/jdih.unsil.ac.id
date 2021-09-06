<?php

namespace App\Http\Middleware;

use App\Models\Peraturan;
use Closure;
use Illuminate\Http\Request;

class IsPublish
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $peraturan = Peraturan::findOrFail($request->peraturan_id);
        if ($peraturan->is_publish) {
            return $next($request);
        }else{
            return redirect()->route('guest.peraturan');
        }
    }
}
