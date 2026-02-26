<?php namespace App\Http\Controllers\Painel;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Slider;
use Request;
use Session;


class SliderController extends PainelController {
    
    
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        $banners = Slider::all();
        return view('painel/sistema/banner')->with('banners', $banners);
            
    }
    
    public function salvar(){
        
        if(Request::input('id') AND Request::input('id') > 0){
            $banner = Slider::find(Request::input('id'));
        } else {
            $banner = new Slider(); 
        }
        
        $arquivo = $_FILES["img_banner"];
        $varArquivo = $arquivo["name"];
        if($varArquivo != ''){
            $arquivo_nome_final = $this->upload('../public/img/slider/', $_FILES['img_banner']);
            $banner->imagem = $arquivo_nome_final;
        }
        
        $ativo = 0;
        if(Request::input('ativo')):
            $ativo = 1;
        endif;

        $banner->titulo = Request::input('titulo');
        $banner->subtitulo = Request::input('subtitulo');
        $banner->botao = Request::input('botao');
        $banner->url = Request::input('url');
        $banner->status = $ativo;

        $banner->save();
        
        $banners = Slider::all();
        Session::put('status.msg', 'Slider salvo com sucesso!');
        return view('painel/sistema/banner')->with('banners', $banners);
            
    }
    
    public function editar($id){
        
        $banners = Slider::all();
        $slider = Slider::find($id);
        return view('painel/sistema/banner')->with('s', $slider)->with('banners', $banners);
            
    } 
    
    public function excluir($id){
        
        Slider::where('id', $id)->delete();
        
        Session::put('status.msg', 'Slider excluído com sucesso!');
        return redirect('painel/sliders');
            
    }
    

}