<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use Request;
use Session;


class LoginController extends PainelController {
    
    public function login(){
        
        $login = Request::input('login');
        $senha = Request::input('senha');
        
        if(empty($login) OR empty($senha)):
            return redirect('painel');
        endif;
        
        $senha = hash('sha1', $senha);
        
        $login = Usuario::where(['login' => $login, 'senha' => $senha, 'ativo' => 1])->first();
        
        if(count($login)):
            
            Session::put('login.logado', 1);
            Session::put('login.id', $login->id);
            Session::put('login.nome', $login->nome);
            Session::put('login.email', $login->email);

            return redirect('/painel/dashboard');
            
        else:
            
            $erro = "Login ou Senha inválidos!";
            Session::put('status.msg', $erro);

            return redirect('painel');
            
        endif;
        
            
    }
    
}