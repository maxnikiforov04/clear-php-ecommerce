<?php

namespace App\Controllers;

use App\model\user_model;

class user_controller
{
    private user_model $model;
    public function __construct(){
        $this->model = new user_model();
    }
    public function userData(){
        return $this->model->getUser();
    }
    public function removeUser()
    {
        $this->model->deleteUser();
    }
    public function updatePass($data){
        $this->model->updatePassword($data);
    }
}