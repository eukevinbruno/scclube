<?php namespace App\Http\Controllers\Site;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use App\Configuracao;


class ContatoController extends SiteController {
    
    public function index(){
        
        $configuracao = Configuracao::find(1);
        
        return view('site/contato/index')->with('configuracao', $configuracao);
            
    }
    
}