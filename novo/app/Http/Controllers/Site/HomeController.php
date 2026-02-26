<?php namespace App\Http\Controllers\Site;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use App\Slider;
use App\Video;
use App\Noticia;
use App\Depoimento;
use App\Configuracao;
use App\Pagina;
use App\Parceiro;

class HomeController extends SiteController {
    
    public function index(){
        
        $sliders = Slider::where(['status' => 1])->orderBy('id', 'DESC')->get();
        $videos = Video::where(['status' => 1])->orderBy('id', 'DESC')->take(4)->get();
        $noticias = Noticia::where(['status' => 1])->orderBy('id', 'DESC')->take(3)->get();
        $depoimentos = Depoimento::where(['status' => 1])->orderBy('id', 'DESC')->take(3)->get();
        $beneficios = Pagina::where(['status' => 1, 'tag' => 'beneficio'])->orderBy('ordem', 'ASC')->get();
        $parceiros = Parceiro::where(['status' => 1])->orderBy('id', 'DESC')->get();
        
        return view('site/home/home')->with('sliders', $sliders)->with('videos', $videos)->with('noticias', $noticias)->with('depoimentos', $depoimentos)->with('beneficios', $beneficios)->with('parceiros', $parceiros);
            
    }
    
}