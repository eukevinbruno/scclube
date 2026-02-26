<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Depoimento;
use Request;
use Session;


class DepoimentoController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $depoimentos = Depoimento::orderBy('id', 'ASC')->get();
        return view('painel/depoimento/index')->with('depoimentos', $depoimentos);
            
    }
    
    public function novo(){
        
        return view('painel/depoimento/data');
            
    }
    
    public function editar($id){
        
        $depoimento = Depoimento::find($id);
        return view('painel/depoimento/data')->with('d', $depoimento);
            
    } 
    
    public function salvar(){
        
        if(Request::input('id') AND Request::input('id') > 0){
            $depoimento = Depoimento::find(Request::input('id'));
        } else {
            $depoimento = new Depoimento(); 
        }
        
        $ativo = 0;
        if(Request::input('ativo')){
            $ativo = 1;
        }
        
        $depoimento->nome = Request::input('nome');
        $depoimento->texto = Request::input('texto');
        $depoimento->status = $ativo;

        $error = 1;
        if($depoimento->save()){
            
            Session::put('status.msg', 'Depoimento salvo com sucesso!');
            return redirect('painel/depoimentos');
            
        } else {
            
            return view('painel/depoimento/data');
            
        }
        
    }   
    
    public function excluir($id){
        
        Depoimento::where('id', $id)->delete();
        
        Session::put('status.msg', 'Depoimento excluído com sucesso!');
        return redirect('painel/depoimentos');
            
    }
   
}