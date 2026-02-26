<?php namespace App\Http\Controllers\Site;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use App\Pagina;
use App\Configuracao;
use App\Video;

class PaginaController extends SiteController {
    
    public function detalhe($id){
        
        $pagina = Pagina::where(['slug' => $id])->first();
        
        $configuracao = Configuracao::find(1);
        
        $redir = $pagina->redir;
        if(!empty($redir)):
            return redirect($redir);
            exit;
        endif;
        
        $videos = array();
        if($pagina->video == 1):
            $videos = Video::where(['status' => 1])->orderBy('id', 'DESC')->get();
        endif;
        
        
        return view('site/pagina/detalhe')->with('pagina', $pagina)->with('configuracao', $configuracao)->with('videos', $videos);
            
    }
    
    public static function menutag($id){
        
        $beneficios = Pagina::where(['status' => 1, 'tag' => $id])->orderBy('ordem', 'ASC')->get();
        
        return $beneficios;
            
    }
    
}