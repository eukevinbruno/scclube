<?php namespace App\Http\Controllers\Site;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use App\Configuracao;


class ContatoController extends SiteController {
    
    public function index(){
        
        $configuracao = Configuracao::find(1);
        
        return view('site/contato/index')->with('configuracao', $configuracao);
            
    }
    
    public function index_enviar(){
        
        $configuracao = Configuracao::find(1);
        $nome_empresa = $configuracao->nome;
        $email_empresa = $configuracao->email;
        $subject = $nome_empresa . " :: Contato";
        
        $data['nome'] = Request::input('nome');
        $data['email'] = Request::input('email');
        $data['telefone'] = Request::input('telefone');
        $data['msg'] = Request::input('msg');
        $data['date'] = date('Y-m-d H:i:s');
        
        \Mail::send(['html' => 'site.email.contato'], $data, function ($message) use ($subject,$email_empresa,$nome_empresa){

        $message->from($email_empresa, $nome_empresa);
        $message->subject($subject);
        $message->to($email_empresa);
        
        });
        
        return redirect('/contato');
            
    }
    
    public function associar(){
        
        $configuracao = Configuracao::find(1);
        
        return view('site/contato/associar')->with('configuracao', $configuracao);
            
    }
    
    public function associar_enviar(){
        
        $configuracao = Configuracao::find(1);
        $nome_empresa = $configuracao->nome;
        $email_empresa = $configuracao->email;
        $subject = $nome_empresa . " :: Associar-se";
        
        $data['nome'] = Request::input('nome');
        $data['email'] = Request::input('email');
        $data['telefone'] = Request::input('telefone');
        $data['bairro_cidade'] = Request::input('bairro_cidade');
        $data['beneficio'] = Request::input('beneficio');
        $data['date'] = date('Y-m-d H:i:s');
        
        \Mail::send(['html' => 'site.email.associar'], $data, function ($message) use ($subject,$email_empresa,$nome_empresa){

        $message->from($email_empresa, $nome_empresa);
        $message->subject($subject);
        $message->to($email_empresa);
        
        });
        
        return redirect('/associar-se');
            
    }
    
    public function associado(){
        
        $configuracao = Configuracao::find(1);
        
        return view('site/contato/associado')->with('configuracao', $configuracao);
            
    }
    
}