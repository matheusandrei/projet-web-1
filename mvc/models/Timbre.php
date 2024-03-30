<?php

namespace App\Models;

use App\Models\CRUD;

class Timbre extends CRUD
{
    protected $table = "stampee_timbre";
    protected $primaryKey = "id";
    protected $fillable = ['titre', 'date', 'couleur', 'description', 'pays', 'dimensions','etat', 'certifie', 'categorie',  'stampee_utilisateur_id'];

    public function getImg($id)
    {
        
        $sql = "SELECT * FROM image_stampee WHERE stampee_timbre_id = $id";
       
        if ($stmt = $this->query($sql)) {
            $queryResults = $stmt->fetchAll();
            return $queryResults[0]['image_principale'];
        } else {
            return false;
        }
    }
}