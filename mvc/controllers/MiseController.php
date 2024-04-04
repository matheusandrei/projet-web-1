<?php


namespace App\Controllers;

use App\Models\Mise;
use App\Providers\View;
use App\Providers\Validator;

class MiseController
{





    public function store($data)
    {
        // Validação dos dados
        $validator = new Validator;
        $validator->field('stampee_utilisateur_id', $data['stampee_utilisateur_id'])->required();
        $validator->field('stampee_enchere_id', $data['stampee_enchere_id'])->required();
        $validator->field('date_heure', $data['date_heure'])->required();
        $validator->field('prix_mise', $data['prix_mise'])->required();
        var_dump($data);
        if ($validator->isSuccess()) {
            $mise = new Mise;
            $insert = $mise->insert($data);
            
            
            if ($insert) {
                
            } else {

                return View::render('error');
            }
        } else {
            // Si des erreurs de validation se produisent, retournez à la page de création avec les erreurs
            $errors = $validator->getErrors();
        }
    }
}