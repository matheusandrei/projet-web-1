<?php


namespace App\Controllers;

use App\Models\Favoris;
use App\Models\Enchere;
use App\Models\Timbre;
use App\Providers\View;
use App\Providers\Validator;

class FavorisController
{

    public function store($data)
    {
        var_dump($data);
        
        
        // Validação dos dados
        $validator = new Validator;
        $validator->field('stampee_utilisateur_id', $data['stampee_utilisateur_id'])->required();
        $validator->field('stampee_enchere_id', $data['stampee_enchere_id'])->required()->unique('Favoris');
     
       
        
        if ($validator->isSuccess()) {
            $mise = new Favoris;
            $insert = $mise->insert($data);
            
            

            if ($insert) {
                echo"inseriu";
            } else {

                return View::render('error');
            }
        } else {
            // Si des erreurs de validation se produisent, retournez à la page de création avec les erreurs
            $errors = $validator->getErrors();
        }
    }
}