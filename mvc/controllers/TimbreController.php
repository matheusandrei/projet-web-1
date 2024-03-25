<?php


namespace App\Controllers;

use App\Models\Timbre;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;

class TimbreController
{


    public function create()
    {
        //if($_SESSION['privilege_id'] == 1){

        
        return View::render('timbre/create');
    }
}