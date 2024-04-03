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
        $timbre = $timbre->select();
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
                return View::redirect('enchere/index');
            } else {
                return View::render('error');
            }
        } else {
            // Si des erreurs de validation se produisent, retournez à la page de création avec les erreurs
            $errors = $validator->getErrors();
            return View::render('enchere/create', ['errors' => $errors, 'timbre' => $data]);
        }
    }
    public function index()
    {
        $enchere = new Enchere;
        $encheres = $enchere->select();

        $donnes = [];

        foreach ($encheres as $enchere) {

            $timbre = new Timbre;
            $selectId = $timbre->selectId($enchere['stampee_timbre_id']);
            $image = $timbre->getImg($enchere['stampee_timbre_id']);
            if ($selectId) {

                $donnes[] = [
                    'enchere'=>$enchere,
                    'timbre' => $selectId,
                    'image' => $image,

                ];
            } else {

                return View::render('error');
            }
        }

        return View::render('enchere/index', ['timbres' => $donnes]);
    }
    public function show($data = [])
    {


        if (isset($data['id']) && $data['id'] != null) {
            $enchere = new Enchere;
            $timbre = new Timbre;
            $selectId = $timbre->selectId($data['id']);

            $image = $timbre->getImg($data['id']);
            $enchere = $enchere->selectId($data['id']);
            var_dump($enchere);

            if ($selectId) {
                return View::render('enchere/show', ['timbre' => $selectId, 'image' => $image, 'enchere' => $enchere]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }
}