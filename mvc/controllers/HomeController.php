<?php
namespace App\Controllers;

use App\Models\ExampleModel;
use App\Providers\View;

class HomeController {
    
    public function index(){
     
       View::render('home' );
    }

}