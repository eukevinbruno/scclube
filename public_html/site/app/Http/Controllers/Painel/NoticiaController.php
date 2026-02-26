<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Noticia;
use Request;
use Session;


class NoticiaController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $noticias = Noticia::orderBy('id', 'ASC')->get();
        return view('painel/noticia/index')->with('noticias', $noticias);
            
    }
    
    public function novo(){
        
        return view('painel/noticia/data');
            
    }
    
    public function editar($id){
        
        $noticia = Noticia::find($id);
        return view('painel/noticia/data')->with('n', $noticia);
            
    } 
    
    public function salvar(){
        
        if(Request::input('id') AND Request::input('id') > 0){
            $noticia = Noticia::find(Request::input('id'));
        } else {
            $noticia = new Noticia(); 
        }
        
        $ativo = 0;
        if(Request::input('ativo')){
            $ativo = 1;
        }
        
        $titulo_noticia = Request::input('titulo');
        $slug = $this->toAscii($titulo_noticia,array('*', '`', '_'));
        
        $noticia->slug = $slug;
        $noticia->titulo = Request::input('titulo');
        $noticia->subtitulo = Request::input('subtitulo');
        $noticia->texto = Request::input('texto');
        $noticia->status = $ativo;
        
        $arquivo_chamada = $_FILES["img_chamada"];
        $varArquivo_chamada = $arquivo_chamada["name"];
        if($varArquivo_chamada != ''):
            $arquivo_nome_final_chamada = $this->upload('../public/img/noticia/', $_FILES['img_chamada']);
            $noticia->imagem_chamada = $arquivo_nome_final_chamada;
        endif;
        
        $arquivo_principal = $_FILES["img_principal"];
        $varArquivo_principal = $arquivo_principal["name"];
        if($varArquivo_principal != ''):
            $arquivo_nome_final_principal = $this->upload('../public/img/noticia/', $_FILES['img_principal']);
            $noticia->imagem = $arquivo_nome_final_principal;
        endif;
            

        $error = 1;
        if($noticia->save()){
            
            Session::put('status.msg', 'Notícia salva com sucesso!');
            return redirect('painel/noticias');
            
        } else {
            
            return view('painel/noticia/data');
            
        }
        
    }   
    
    public function excluir($id){
        
        Noticia::where('id', $id)->delete();
        
        Session::put('status.msg', 'Notícia excluída com sucesso!');
        return redirect('painel/noticias');
            
    }
   
}