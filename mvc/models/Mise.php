<?php

namespace App\Models;

use App\Models\CRUD;

class Mise extends CRUD
{
    protected $table = 'mise_stampee';
    protected $primaryKey = ['stampee_utilisateur_id', 'stampee_enchere_id'];
    protected $fillable = ['stampee_utilisateur_id', 'stampee_enchere_id', 'date', 'heure', 'prix'];

}