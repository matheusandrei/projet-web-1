<?php
namespace App\Models;
use App\Models\CRUD;

class Enchere extends CRUD{
    protected $table = 'stampee_enchere';
    protected $primaryKey = 'id';
    protected $fillable = ['prix', 'date_debut', 'date_fin', 'actif', 'coup_de_coeur','stampee_timbre_id'];



} 