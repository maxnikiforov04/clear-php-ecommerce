<?php

namespace App\model;

use PDO;

class cart_model
{
    private static PDO $pdo;
    public function __construct(){
        self::$pdo = new PDO("mysql:host=127.0.0.1;dbname=market", "root", "root");
    }
    public function getAllCarts(): false|\PDOStatement
    {
        return self::$pdo->query("SELECT * FROM product");
    }
    public function getCart($id): false|\PDOStatement
    {
        return self::$pdo->query("SELECT * FROM product WHERE id = $id");
    }
    public function getCategory($categoryId){
        return self::$pdo->query("SELECT * FROM category WHERE id = $categoryId");
    }
    public function addProductToCart($data): void
    {
        $cart = $this->getCart($data['product_id'])->fetch(PDO::FETCH_ASSOC);
        if (!isset($_COOKIE['cart'])) {
            $_COOKIE['cart'] = [];
        } else {
            $_COOKIE['cart'] = json_decode($_COOKIE['cart'], true);
        }
        $productId = $data['product_id'];
        if (!in_array($cart, $_COOKIE['cart'])) {
            $_COOKIE['cart'][] = $cart;
            setcookie('cart', json_encode($_COOKIE['cart']), time() + (86400 * 30), "/");
        }
        header('location:/prog/');
        print_r($_COOKIE['cart']);
    }
    public function removeProductFromCart($data) {
        $cart = $this->getCart($data['product_id'])->fetch(PDO::FETCH_ASSOC);
        if (!isset($_COOKIE['cart'])) {
            return;
        }
        $currentCart = json_decode($_COOKIE['cart'], true);
        foreach ($currentCart as $index => $item) {
            if ($item['id'] == $cart['id']) {
                unset($currentCart[$index]);
                break;
            }
        }
        setcookie('cart', json_encode(array_values($currentCart)), time() + (86400 * 30), "/");
        header('Location: /prog/cart');
    }
}