<?php
namespace App\Models;
use App\Models\CRUD;

class User extends CRUD{
    protected $table = "stampee_utilisateur";
    protected $primaryKey = "id";
    protected $fillable = ['nom', 'email', 'mot_de_passe', 'privilege_stampee_id', 'username'];

    public function hashPassword($mot_de_passe, $cost = 10){
        return  password_hash($mot_de_passe, PASSWORD_BCRYPT, ['cost' => $cost]);
    }

    public function checkUser($username, $mot_de_passe){
        $user = $this->unique('username', $username);
        if($user){
            if(password_verify($mot_de_passe, $user['mot_de_passe'])){
                 session_regenerate_id();
                 $_SESSION['user_id'] = $user['id'];
                // $_SESSION['user_name'] = $user['name'];
                // $_SESSION['privilege_id'] = $user['privilege_id'];
                // $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}