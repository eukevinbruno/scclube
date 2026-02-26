<?php namespace App\Http\Controllers\Painel;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;


class DashboardController extends PainelController {
 
    public function __construct()
    {
        $this->middleware('authMiddleware');
    }
    
    public function index(){
        
        return view('painel/dashboard');
            
    }
    
}