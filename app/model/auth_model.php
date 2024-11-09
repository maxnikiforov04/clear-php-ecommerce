<?php

namespace App\model;

use PDO;

class auth_model
{
    private static $pdo;
    public function __construct(){
        self::$pdo = new PDO("mysql:host=127.0.0.1;dbname=market", "root", "root");
    }
    public function checkUser($data){
        $username = $data['name'];
        $password = $data['pass'];
        $stmt = self::$pdo->prepare('SELECT * FROM user WHERE name = :username');
        $stmt->bindParam(':username', $username);
        if ($stmt->execute()) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($user);
            if ($password == $user['password']) {
                session_start();
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password']
                ];
                print_r($_SESSION['user']);
                header("location:/prog/");
            } else {
                echo "Invalid username or password.";

            }
        } else {
            echo "Error executing query.";
        }
    }
    public function createUser($data){
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];
        if($password == $confirmPassword
            && !empty($email) &&
            !empty($username) &&
            !empty($password)) {
            $stmt = self::$pdo->prepare('INSERT INTO user (email, name, password) VALUES (:email, :username, :password)');
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            if ($stmt->execute()) {
                echo "User registered successfully.";
                header("location:/prog/");
            } else {
                echo "Error registering user.";
            }
        }else{
            echo "error";
        }
    }
}