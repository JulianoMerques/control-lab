<?php

namespace App\Core\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckNivelAccess
{
    public function handle($request, Closure $next)
    {
        $parameters['id'] = $request->route()->getParameter('id') ? (int) $request->route()->getParameter('id') : null;

        //Allowed Routes
        $allowed_routes = ['pedidos', 'pedidos.info','usuarios.edit', 'usuarios.update','usuarios.show'];

        $usuario = Auth::user();

        //Se usuário não for administrador e tentar acessar uma rota sem permissão
        if(!$usuario->isAdm()){

            if(in_array($request->route()->getName(), $allowed_routes) AND $parameters['id'] === Auth::user()->id){
                return $next($request);
            }

            if($request->route()->getPrefix() === 'admin/maquinas' || $request->route()->getPrefix() === 'admin/usuarios'
                ||$request->route()->getPrefix() === 'admin/manutencao' ||$request->route()->getPrefix() === 'admin/relatorios'
                ||$request->route()->getPrefix() === 'admin/salas' ||$request->route()->getPrefix() === 'admin/problemas'){
                return redirect()->route('dashboard')->withMessage('error|Você não tem permissão para acessar 
                    essa página!');
            }
        }

        return $next($request);
    }
}
