<?php namespace App\Http\Controllers\Site;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use App\Faq;
use App\Configuracao;

class FaqController extends SiteController {
    
    public function detalhe(){
        
        $faqs = Faq::orderBy('ordem', 'ASC')->get();
        
        $configuracao = Configuracao::find(1);
        
        return view('site/faq/index')->with('faqs', $faqs)->with('configuracao', $configuracao);
            
    }
    
}