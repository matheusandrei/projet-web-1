<?php

namespace App\Models;
use App\Models\CRUD;

class Image extends CRUD
{
    protected $table = 'image_stampee';
    protected $primaryKey = 'id';
    
    protected $fillable = ['image_principale', 'stampee_timbre_id', 'image_secondaire'];

   
}