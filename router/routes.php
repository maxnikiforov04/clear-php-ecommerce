<?php

use App\Controllers\user_controller;
use App\Services\router;
use App\Controllers\auth_controller;
use App\Controllers\cart_controller;
router::page('/', 'main');
router::page('/test', 'test');
router::page('/register', 'register');
router::page('/login', 'login');
router::page('/profile', 'profile');
router::page('/logout', 'logout');
router::page('/cart', 'cart');
router::page('/product/', 'product');
router::page('/profile/change_password', 'change_password');
router::post('/auth/register',auth_controller::class, 'register');
router::post('/auth/login',auth_controller::class, 'login');
router::post('/cart/add_product',cart_controller::class, 'addCart');
router::post('/cart/remove_product',cart_controller::class, 'deleteCart');
router::post('/cart/update_cart',cart_controller::class, 'updateCart');
router::post('/profile/new_password',user_controller::class, 'updatePass');
router::post('/profile/delete_user',user_controller::class, 'removeUser');
router::Enable();
