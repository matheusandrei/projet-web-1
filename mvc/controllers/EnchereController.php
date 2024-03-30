<?php


namespace App\Controllers;

use App\Models\Enchere;
use App\Models\Image;
use App\Models\Timbre;
use App\Providers\View;
use App\Providers\Validator;

class EnchereController
{


    public function create()
    {
        //if($_SESSION['privilege_id'] == 1){
            $timbre = new Timbre;
            $timbre = $timbre->select('titre');
            return View::render('enchere/create', ['timbres' => $timbre]);
    }

    
    public function store($data)
    {
        var_dump($data);
        // Validação dos dados
        $validator = new Validator;
        $validator->field('prix', $data['prix'])->required();
        $validator->field('date_debut', $data['date_debut'])->required();
        $validator->field('date_fin', $data['date_fin'])->required();
        $validator->field('stampee_timbre_id', $data['stampee_timbre_id'])->required();

        if ($validator->isSuccess()) {
            $enchere = new Enchere;
            $insert = $enchere->insert($data);

            if ($insert) {
                echo'inseriu';
        } else {
            // Si des erreurs de validation se produisent, retournez à la page de création avec les erreurs
            $errors = $validator->getErrors();
            return View::render('enchere/create', ['errors' => $errors, 'timbre' => $data]);
        }
    }
    }
}