<?php

namespace App\Models;

use App\Models\CRUD;

class Favoris extends CRUD
{
    protected $table = 'favoris_stampee';
    protected $primaryKey = ['id'];
    protected $fillable = ['stampee_utilisateur_id', 'stampee_enchere_id'];

    
}