<?php namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;
use App\Pagina;

abstract class SiteController extends Controller
{
   
    public static function menu(){
        
        $paginas0 = Pagina::where(['parent_id' => 0,'status' => 1])->orderBy('ordem', 'ASC')->get();
        
        $array_paginas = array();
        
        $contaArray0 = 0;
        
        
        foreach ($paginas0 as $item) {
            
            $array_paginas['n0'][$contaArray0] = ['id' => $item->id,'titulo' => $item->titulo,'slug' => $item->slug,'status' => $item->status];
            $id0 = $item->id;
            
            $paginas1 = Pagina::where(['parent_id' => $id0,'status' => 1])->orderBy('ordem', 'ASC')->get();
            
            $contaArray1 = 0;

            foreach ($paginas1 as $item1) {
                
                $array_paginas['n1'][$item->titulo][$contaArray1] = ['id' => $item1->id,'titulo' => $item1->titulo,'slug' => $item1->slug,'status' => $item1->status];
                
                //$array_paginas[$contaArray0]['n1'][$contaArray1]= $item1->titulo; 
                $id1 = $item1->id;
                
                $paginas2 = Pagina::where(['parent_id' => $id1,'status' => 1])->orderBy('ordem', 'ASC')->get();
                
                $contaArray2 = 0;
                
                foreach ($paginas2 as $item2) {
                    
                    $array_paginas['n2'][$item1->titulo][$contaArray2] = ['id' => $item2->id,'titulo' => $item2->titulo,'slug' => $item2->slug,'status' => $item2->status];
                    
                    //$array_paginas[$contaArray0][$contaArray1][$contaArray2]['n2'] = $item2->titulo; 
                    
                    $contaArray2++;
                    
                }
                
                $contaArray1++;
            }
            
            $contaArray0++;
            
            
            
            
            //die("<PRE>" . print_r($array_paginas,1));
                    
        }  
        
        return $array_paginas;
        
    }
    
}