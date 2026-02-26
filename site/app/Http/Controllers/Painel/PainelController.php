<?php namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;


abstract class PainelController extends Controller
{
  
    public function upload($local, $arquivo){
        
        //UPLOAD DO ARQUIVO
        $_UP['pasta'] = $local;
        $_UP['tamanho'] = 1024 * 1024 * 10; // 10Mb
        $_UP['extensoes'] = array('jpg', 'png', 'gif', 'zip', 'rar', 'pdf');
        
        
        $arquivo_nome = $arquivo['name'];
        $arquivo_nome_array = explode(".", $arquivo_nome);
        $extensao = strtolower($arquivo_nome_array[1]);
        
        if (!in_array($extensao, $_UP['extensoes'])) {
            echo "O tipo de arquivo enviado (" . $extensao . ") não é permitido.";
            exit;
        }
        
        $nome_final = md5(uniqid(time())).'.'.$extensao;
        
        if(move_uploaded_file($arquivo['tmp_name'], $local . $nome_final)){
        
            return $nome_final;
            
        } else {
            
            return false;
            
        }
        
    }
    
    
    public function toAscii($str, $replace=array(), $delimiter='-') {
        setlocale(LC_ALL, 'en_US.UTF8');
        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }
    
}