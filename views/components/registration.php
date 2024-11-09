<?php
use App\Services\makepdo;
$products = new makepdo();
?>

<div class="container w-25">
    <h1 class="mb-3">Регистрация</h1>
    <form method="post" enctype="multipart/form-data" action="/prog/auth/register">
        <div class="mb-3">
            <h3><label for="username" class="form-label">Имя пользователя</label></h3>
            <input type="text" name="username" class="form-control" id="username" required>
        </div>
        <div class="mb-3">
            <h3><label for="email" class="form-label">Электронная почта</label></h3>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <h3><label for="password" class="form-label">Пароль</label></h3>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
            <h3><label for="confirmPassword" class="form-label">Подтвердите пароль</label></h3>
            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required>
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>