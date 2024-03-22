<?php
namespace App\Models;
use App\Models\CRUD;

class Privilege extends CRUD{
    protected $table = "stampee_privilege";
    protected $primaryKey = "id";
}

