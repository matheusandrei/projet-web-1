<?php


namespace App\Controllers;

use App\Models\Mise;
use App\Models\Enchere;
use App\Models\Timbre;
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

        if ($validator->isSuccess()) {
            $mise = new Mise;
            $insert = $mise->insert($data);
            var_dump($data);
            

            if ($insert) {
                $timbre = new Timbre;
                $enchere = new Enchere;
                $updatePrix = $enchere->updatePrix($data['prix_mise'], $data['stampee_enchere_id']);
               

                if ($updatePrix) {
                    return View::render('enchere/show');
                } else {
                    echo 'erro';
                }
            } else {

                return View::render('error');
            }
        } else {
            // Si des erreurs de validation se produisent, retournez à la page de création avec les erreurs
            $errors = $validator->getErrors();
        }
    }
}
