<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestURI();
        LogAcesso::create(['log'=>"IP $ip requisitou a rota $rota"]);

        //return $next($request);
        $resposta = $next($request);
        $resposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados!!!');

        return $resposta;
    }
}
