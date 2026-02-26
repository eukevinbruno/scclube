<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Faq;
use Request;
use Session;


class FaqController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $faq = Faq::orderBy('id', 'ASC')->get();
        return view('painel/faq/index')->with('faq', $faq);
            
    }
    
    public function novo(){
        
        return view('painel/faq/data');
            
    }
    
    public function editar($id){
        
        $faq = Faq::find($id);
        return view('painel/faq/data')->with('f', $faq);
            
    } 
    
    public function salvar(){
        
        if(Request::input('id') AND Request::input('id') > 0){
            $faq = Faq::find(Request::input('id'));
        } else {
            $faq = new Faq(); 
        }
        
        $faq->pergunta = Request::input('pergunta');
        $faq->resposta = Request::input('resposta');
        $faq->ordem = Request::input('ordem');

        $error = 1;
        if($faq->save()){
            
            Session::put('status.msg', 'Pergunta salva com sucesso!');
            return redirect('painel/faq');
            
        } else {
            
            return view('painel/faq/data');
            
        }
        
    }   
    
    public function excluir($id){
        
        Faq::where('id', $id)->delete();
        
        Session::put('status.msg', 'Pergunta excluída com sucesso!');
        return redirect('painel/faq');
            
    }
   
}