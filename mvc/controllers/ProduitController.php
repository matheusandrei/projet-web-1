<?php
// namespace App\Controllers;


// use App\Providers\View;
// use App\Providers\Validator;
// use App\Providers\Auth;
// use App\Models\Produit;

// class ProduitController {
//     public function __construct()
//     {
//         Auth::session();
//     } 

//     public function index() {
     
//             $Produit = new Produit;
//             $select = $Produit->select('');
//             if($select){
//                 return View::render('produit/index', ['Produits'=> $select]);
//             }
//             return View::render('error');
        
//     }

//     public function show($data = []){
//         if(isset($data['id']) && $data['id']!=null){
//             $Produit = new Produit;
//             $selectId = $Produit->selectId($data['id']);
//             if($selectId){
//                 return View::render('Produit/show', ['Produit' => $selectId]);
//             }else{
//                 return View::render('error');
//             }
//         }else{
//             return View::render('error', ['message'=>'Could not find this data']);
//         }
//     }
//     public function create()
//     {
//         if ($_SESSION['privilege_id'] == 1 || $_SESSION['privilege_id'] == 2) {
//             return View::render('produit/create');
//         } else {
//             return View::render('login');
//         }
//     }

//     public function store($data)
//     {

//         $validator = new Validator;
//         $validator->field('name', $data['name'], 'Le nom')->required()->max(100);
//         $validator->field('description', $data['description']);
//         $validator->field('price', $data['price'], 'price');


//         if ($validator->isSuccess()) {

//             $Produit = new Produit;
//             $insert = $Produit->insert($data);
//             if ($insert) {
//                 return View::redirect('produit/index');
//             } else {
//                 return View::render('error');
//             }
//         } else {
//             $errors = $validator->getErrors();
//             //print_r($errors);
//             return View::render('produit/create', ['errors' => $errors, 'produit' => $data]);
//         }
//     }
    
// }