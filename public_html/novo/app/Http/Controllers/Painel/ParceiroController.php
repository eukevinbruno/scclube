<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Parceiro;
use Request;
use Session;


class ParceiroController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $parceiros = Parceiro::all();
        return view('painel/parceiro/index')->with('parceiros', $parceiros);
            
    }
    
    public function novo(){
        
        return view('painel/parceiro/data');
            
    }
    
    public function salvar(){
        
        if(Request::input('id') AND Request::input('id') > 0){
            $parceiro = Parceiro::find(Request::input('id'));
        } else {
            $parceiro = new Parceiro(); 
        }
        
        
        $arquivo = $_FILES["img_banner"];
        $varArquivo = $arquivo["name"];
        if($varArquivo != ''){
            $arquivo_nome_final = $this->upload('../public/img/partner/', $_FILES['img_banner']);
            $parceiro->imagem = $arquivo_nome_final;
        }
        
        $ativo = 0;
        if(Request::input('ativo')):
            $ativo = 1;
        endif;

        $parceiro->nome = Request::input('nome');
        $parceiro->status = $ativo;

        $parceiro->save();
        
        $parceiros = Parceiro::all();
        Session::put('status.msg', 'Parceiro enviado com sucesso!');
        return view('painel/parceiro/data')->with('parceiros', $parceiros);
            
    }
    
    public function editar($id){
        
        $parceiro = Parceiro::find($id);
        return view('painel/parceiro/data')->with('p', $parceiro);
            
    } 
    
    public function excluir($id){
        
        Parceiro::where('id', $id)->delete();
        
        Session::put('status.msg', 'Parceiro excluído com sucesso!');
        return redirect('painel/parceiros');
            
    }
    

}