<?php namespace App\Http\Controllers\Site;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use App\Noticia;

class NoticiaController extends SiteController {
    
    public function detalhe($id){
        
        $noticia = Noticia::where(['slug' => $id])->first();
        
        return view('site/noticia/detalhe')->with('noticia', $noticia);
            
    }
    
}