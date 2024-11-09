<?php

namespace App\Services;

use App\models\Db_Query;
use PDO;

class makepdo
{
    public $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=market", 'root', "root");
    }
    public function getAllCategories(){
        return $this->pdo->query("SELECT * FROM category");
    }
}