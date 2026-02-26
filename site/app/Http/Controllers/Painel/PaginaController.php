<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pagina;
use Request;
use Session;


class PaginaController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $paginas = Pagina::orderBy('ordem', 'ASC')->get();
        
        $paginas0 = Pagina::where(['parent_id' => 0,'status' => 1])->orderBy('ordem', 'ASC')->get();
        
        $array_paginas = array();
        
        $contaArray0 = 0;
        
        
        foreach ($paginas0 as $item) {
            
            $array_paginas['n0'][$contaArray0] = ['id' => $item->id,'titulo' => $item->titulo,'status' => $item->status];
            $id0 = $item->id;
            
            $paginas1 = Pagina::where(['parent_id' => $id0,'status' => 1])->orderBy('ordem', 'ASC')->get();
            
            $contaArray1 = 0;

            foreach ($paginas1 as $item1) {
                
                $array_paginas['n1'][$item->titulo][$contaArray1] = ['id' => $item1->id,'titulo' => $item1->titulo,'status' => $item1->status];
                
                //$array_paginas[$contaArray0]['n1'][$contaArray1]= $item1->titulo; 
                $id1 = $item1->id;
                
                $paginas2 = Pagina::where(['parent_id' => $id1,'status' => 1])->orderBy('ordem', 'ASC')->get();
                
                $contaArray2 = 0;
                
                foreach ($paginas2 as $item2) {
                    
                    $array_paginas['n2'][$item1->titulo][$contaArray2] = ['id' => $item2->id,'titulo' => $item2->titulo,'status' => $item2->status];
                    
                    //$array_paginas[$contaArray0][$contaArray1][$contaArray2]['n2'] = $item2->titulo; 
                    
                    $contaArray2++;
                    
                }
                
                $contaArray1++;
            }
            
            $contaArray0++;
                    
        }
        
        
        
        return view('painel/pagina/index')->with('paginas', $array_paginas);
            
    }
    
    public function novo(){
        
        $paginas = Pagina::orderBy('id', 'ASC')->get();
        return view('painel/pagina/data')->with('menus', $paginas);
            
    }
    
    public function editar($id){
        
        $pagina = Pagina::find($id);
        $paginas = Pagina::orderBy('id', 'ASC')->get();
        
        return view('painel/pagina/data')->with('p', $pagina)->with('menus', $paginas);
            
    } 
    
    public function salvar(){
        
        if(Request::input('id') AND Request::input('id') > 0){
            $pagina = Pagina::find(Request::input('id'));
        } else {
            $pagina = new Pagina(); 
        }
        
        $ativo = 0;
        if(Request::input('ativo')){
            $ativo = 1;
        }
        
        $titulo_pagina = Request::input('titulo');
        $slug = $this->toAscii($titulo_pagina,array('*', '`', '_'));
        
        $parent_id = 0;
        if(Request::input('parent_id') != ''):
            $parent_id = Request::input('parent_id');
        endif;
        
        $ordem = 0;
        if(Request::input('ordem') != ''):
            $ordem = Request::input('ordem');
        endif;
        
        
        $pagina->slug = $slug;
        $pagina->parent_id = $parent_id;
        $pagina->titulo = Request::input('titulo');
        $pagina->texto = Request::input('texto');
        $pagina->redir = Request::input('redir');
        $pagina->tag = Request::input('tag');
        $pagina->resumo = Request::input('resumo');
        $pagina->icone = htmlentities(Request::input('icone'));
        $pagina->video = Request::input('video');
        $pagina->ordem = $ordem;
        $pagina->status = $ativo;

        $error = 1;
        if($pagina->save()){
            
            Session::put('status.msg', 'Página salva com sucesso!');
            return redirect('painel/paginas');
            
        } else {
            
            return view('painel/pagina/data');
            
        }
        
    }   
    
    public function excluir($id){
        
        Pagina::where('id', $id)->delete();
        
        Session::put('status.msg', 'Página excluída com sucesso!');
        return redirect('painel/paginas');
            
    }
   
}