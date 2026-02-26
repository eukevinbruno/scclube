<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use Request;
use Session;


class UsuarioController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $usuarios = Usuario::orderBy('nome', 'ASC')->get();
        return view('painel/usuario/index')->with('usuarios', $usuarios);
            
    }
    
    public function novo(){
        
        return view('painel/usuario/data');
            
    }
    
    public function editar($id){
        
        $usuario = Usuario::find($id);
        return view('painel/usuario/data')->with('u', $usuario);
            
    } 
    
    public function salvar(){
        
        if(Request::input('id') AND Request::input('id') > 0){
            $usuario = Usuario::find(Request::input('id'));
        } else {
            $usuario = new Usuario(); 
        }
        
        $ativo = 0;
        if(Request::input('ativo')){
            $ativo = 1;
        }
        
        $tipo = Request::input('tipo');
        
        $senha = Request::input('senha');
        if(!empty($senha)):
            $usuario->senha = hash('sha1', $senha);
        endif;
        
        $usuario->nome = Request::input('nome');
        $usuario->email = Request::input('email');
        $usuario->login = Request::input('login');
        $usuario->ativo = $ativo;

        $error = 1;
        if($usuario->save()){
            
            Session::put('status.msg', 'Usuário salvo com sucesso!');
            return redirect('painel/usuarios');
            
        } else {
            
            return view('painel/usuario/data');
            
        }
        
    }    

    public function sair(){
        
        Session::forget('login.id');
        Session::forget('login.nome');
        Session::forget('login.email');
        Session::forget('login.logado');
                      
        return redirect('painel');
            
    } 
    
    public function _ajax_email(){
        
        $email = Request::input('email');
        
        $usuario = Usuario::where(['email' => $email])->get();
        
        if(count($usuario)){
            return 2;
        } else {
            return 1;
        }
            
    }
    
    public function _ajax_login(){
        
        $login = Request::input('login');
        
        $usuario = Usuario::where(['login' => $login])->get();
        
        if(count($usuario)){
            return 2;
        } else {
            return 1;
        }
            
    }
    
}