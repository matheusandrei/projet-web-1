<?php


namespace App\Controllers;

use App\Models\Timbre;
use App\Models\Image;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;

class TimbreController
{


    public function create()
    {
        //if($_SESSION['privilege_id'] == 1){


        return View::render('timbre/create');
    }



    public function store($data)
    {
        var_dump($data);
        // Validação dos dados
        $validator = new Validator;
        $validator->field('titre', $data['titre'])->required()->max(100);
        $validator->field('date', $data['date'])->required();
        $validator->field('description', $data['description'])->required()->max(250);
        $validator->field('etat', $data['etat'])->required()->max(45);
        $validator->field('certifie', $data['certifie']);
        
        $validator->field('categorie', $data['categorie'])->required()->max(45);
        $validator->field('stampee_utilisateur_id', $data['stampee_utilisateur_id'])->required();

        if ($validator->isSuccess()) {
            $timbre = new Timbre;
            $insert = $timbre->insert($data);

            if ($insert) {
                // Vérifie si le fichier a été correctement téléchargé
                if (isset($_FILES['image_principale']) && $_FILES['image_principale']['error'] === UPLOAD_ERR_OK) {
                    // Définit le chemin du répertoire où le fichier sera stocké
                    $target_dir = "images/";

                    // Définit le nom du fichier de l'image principale
                    $image_name = basename($_FILES['image_principale']['name']);

                    // Définit le chemin complet du fichier
                    $target_file = $target_dir . $image_name;

                    // Déplace le fichier vers le répertoire de destination
                    if (move_uploaded_file($_FILES['image_principale']['tmp_name'], $target_file)) {
                        // Si le fichier a été déplacé avec succès, insère le nom du fichier dans la base de données
                        $img = new Image;
                        $imgChamps = ['stampee_timbre_id' => $insert, 'image_principale' => $image_name];
                        $insert_img = $img->insert($imgChamps);

                        print_r($imgChamps);
                        if ($insert_img) {
                            return View::redirect('timbre/index');
                        } else {
                            // Si une erreur se produit lors de l'insertion du nom du fichier dans la base de données, vous pouvez le gérer ici
                            return View::render('error');
                        }
                    } else {

                        return View::render('error');
                    }
                } else {

                    return View::render('error');
                }
            } else {
                // Si une erreur se produit lors de l'insertion des données du produit dans la base de données, vous pouvez le gérer ici
                return View::render('error');
            }
        } else {
            // Si des erreurs de validation se produisent, retournez à la page de création avec les erreurs
            $errors = $validator->getErrors();
            return View::render('timbre/create', ['errors' => $errors, 'timbre' => $data]);
        }
    }
    public function index()
    {

        $timbre = new Timbre;
        $select = $timbre->select('titre');
        if ($select) {
            return View::render('timbre/index', ['timbre' => $select]);
        }
        return View::render('error');
    }
    public function show($data = [])
    {


        if (isset($data['id']) && $data['id'] != null) {
            $timbre = new Timbre;
            $selectId = $timbre->selectId($data['id']);
            $image = $timbre->getImg($data['id']);


            if ($selectId) {
                return View::render('timbre/show', ['timbre' => $selectId, 'image' => $image]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }
    public function delete($data)
    {
       //var_dump($data);
        $timbre = new  Timbre;
        $delete = $timbre->delete($data['id']);
        if ($delete) {
            return View::redirect('timbre/index');
        } else {

            return View::render('error');
        }
    }
    public function edit($data = []){
        if(isset($data['id']) && $data['id']!=null){
            $timbre = new Timbre;
            $selectId = $timbre->selectId($data['id']);
            if($selectId){
                return View::render('timbre/edit', ['timbre' => $selectId]);
            }else{
                return View::render('error');
            }
        }else{
            return View::render('error', ['message'=>'Could not find this data']);
        }
    }
    public function update($data, $get) {
        $validator = new Validator;
        $validator->field('titre', $data['titre'])->required()->max(100);
        $validator->field('date', $data['date'])->required();
        $validator->field('description', $data['description'])->required()->max(250);
        $validator->field('etat', $data['etat'])->required()->max(45);
        $validator->field('certifie', $data['certifie']);
        $validator->field('categorie', $data['categorie'])->required()->max(45);
        $validator->field('stampee_utilisateur_id', $data['stampee_utilisateur_id'])->required();
    
        if ($validator->isSuccess()) {
            $timbre = new Timbre;
            $update = $timbre->update($data, $get['id']);
    
            if ($update) {
                return View::redirect('timbre/show?id=' . $get['id']);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('timbre/edit', ['errors' => $errors, 'timbre' => $data]);
        }
    }
    
}