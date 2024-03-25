<?php

namespace App\Models;

use App\Models\CRUD;

class Timbre extends CRUD
{
    protected $table = "stampee_timbre";
    protected $primaryKey = "id";
    protected $fillable = ['titre', 'date', 'couleur', 'description', 'pays', 'dimensions', 'certifie', 'categorie', 'stampee_enchere_id', 'stampee_utilisateur_id'];


}