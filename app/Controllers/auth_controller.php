<?php
namespace App\Controllers;
use App\model\auth_model;
class auth_controller
{
    public auth_model $model;

    public function __construct(){
        $this->model = new auth_model();
    }
    public function register($data): void
    {
        $this->model->createUser($data);
    }
    public function login($data): void {
       $this->model->checkUser($data);
    }
}