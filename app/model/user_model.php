<?php

namespace App\model;
use PDO;
class user_model
{
    private static PDO $pdo;
    public function __construct(){
        self::$pdo = new PDO("mysql:host=127.0.0.1;dbname=market", "root", "root");
    }
    public function updatePassword($data){
        $pass = $data['pass'];
        $checkPass = $data['checkPass'];
        if($pass === $checkPass){
            $current_user = $_SESSION['user']['id'];
            $stmt = self::$pdo->prepare("UPDATE user SET password = :password WHERE id = :user_id");
            $stmt->bindParam(':password', $pass);
            $stmt->bindParam(':user_id', $current_user);
            if($stmt->execute()){
                echo "success";
                header('location:/prog/');
            }else{
                return "error";
            }
        }else{
            return "not_correct_password";
        }
    }
    public function deleteUser(){
        echo "nigger";
        $current_user = $_SESSION['user']['id'];
        $stmt = self::$pdo->query("DELETE FROM user WHERE id = :user_id");
        $stmt->bindParam(":user_id", $current_user);
        if($stmt->execute()){
            echo "success";
            return "success";
        }else{
            echo "error";
            return "error";
        }
    }
    public function getUser(){
        $user_id = $_SESSION['user']['id'];
        $stmt = self::$pdo->prepare("SELECT * FROM user WHERE id = :user_id");
        $stmt->bindParam(":user_id", $user_id);
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return "error";
        }
    }
}