<?php

namespace App\Controllers;
use App\model\cart_model;

class cart_controller
{
    private cart_model $model;
    public function __construct(){
        $this->model = new cart_model();
    }
    public function list()
    {
        return $this->model->getAllCarts();
    }
    public function singleCart($id)
    {
        return $this->model->getCart($id);
    }
    public function category($categoryId){
        return $this->model->getCategory($categoryId);
    }
    public function addCart($data):void
    {
        $this->model->addProductToCart($data);
    }
    public function deleteCart($data): void
    {
        $this->model->removeProductFromCart($data);
    }
}