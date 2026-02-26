<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Video;
use Request;
use Session;


class VideoController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $videos = Video::orderBy('id', 'ASC')->get();
        return view('painel/video/index')->with('videos', $videos);
            
    }
    
    public function novo(){
        
        return view('painel/video/data');
            
    }
    
    public function editar($id){
        
        $video = Video::find($id);
        return view('painel/video/data')->with('v', $video);
            
    } 
    
    public function salvar(){
        
        if(Request::input('id') AND Request::input('id') > 0){
            $video = Video::find(Request::input('id'));
        } else {
            $video = new Video(); 
        }
        
        $ativo = 0;
        if(Request::input('ativo')){
            $ativo = 1;
        }
        
        $video->titulo = Request::input('titulo');
        $video->descricao = Request::input('descricao');
        $video->embed = Request::input('embed');
        $video->status = $ativo;

        $error = 1;
        if($video->save()){
            
            Session::put('status.msg', 'Vídeo salvo com sucesso!');
            return redirect('painel/videos');
            
        } else {
            
            return view('painel/video/data');
            
        }
        
    }    
    
     public function excluir($id){
        
        Video::where('id', $id)->delete();
        
        Session::put('status.msg', 'Vídeo excluído com sucesso!');
        return redirect('painel/videos');
            
    }
   
}