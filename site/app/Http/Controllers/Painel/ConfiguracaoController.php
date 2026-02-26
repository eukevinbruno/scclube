<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pessoa;
use App\Configuracao;
use Request;
use Session;


class ConfiguracaoController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $configuracao = Configuracao::find(1);
        return view('painel/sistema/data')->with('configuracao', $configuracao);
            
    }
    
    
    public function salvar(){
        
        $configuracao = Configuracao::find(1);
        
        $configuracao->nome = Request::input('nome');
        $configuracao->email = Request::input('email');
        $configuracao->url = Request::input('url');
        $configuracao->telefone = Request::input('telefone');
        $configuracao->whatsapp = Request::input('whatsapp');
        $configuracao->endereco = Request::input('endereco');
        $configuracao->cep = Request::input('cep');
        $configuracao->numero = Request::input('numero');
        $configuracao->bairro = Request::input('bairro');
        $configuracao->cidade = Request::input('cidade');
        $configuracao->uf = Request::input('uf');
        $configuracao->lat = Request::input('latitude');
        $configuracao->lng = Request::input('longitude');
        $configuracao->facebook = Request::input('facebook');
        $configuracao->twitter = Request::input('twitter');
        $configuracao->instagram = Request::input('instagram');
        $configuracao->texto_bemvindo = Request::input('texto_bemvindo');
        $configuracao->metatag_keywords = Request::input('metatag_keyword');
        $configuracao->metatag_description = Request::input('metatag_description');
        $configuracao->metatag_title = Request::input('metatag_title');
        $configuracao->save();
        
        //$configuracao_salvar = Configuracao::find(1);
        
        Session::put('status.msg', 'Configurações do sistema salvas com sucesso!');
        return view('painel/sistema/data')->with('configuracao', $configuracao);
            
    }
    
    public function salvar_exit(){
        
        $configuracao = Configuracao::find(1);
        
        if(isset($_FILES["img_banner"])){
            
            $arquivo = $_FILES["img_banner"];
            $varArquivo = $arquivo["name"];
            if($varArquivo != ''){
                $arquivo_nome_final = $this->upload('../public/dist/img/', $_FILES['img_banner']);
                $configuracao->exit_popup_img = $arquivo_nome_final;
            }

        }
        
        
        $configuracao->exit_popup = Request::input('exit_popup');
        $configuracao->exit_popup_url = Request::input('exit_popup_url');
        
//        die("<PRE>" . print_r($configuracao,1));
        $configuracao->save();
        
        Session::put('status.msg', 'Configurações do exit popup salvas com sucesso!');
        return view('painel/sistema/data')->with('configuracao', $configuracao);
            
    }
    

}