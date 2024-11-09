<?php
use App\Services\page;
use App\Controllers\user_controller;
$controller = new user_controller();
$user = $controller->userData();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
<body>
<?php
page::part('header')
?>
<div class="container mt-5">
    <h2>Профиль пользователя</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Информация о пользователе</h5>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email'])?></p>
            <p><strong>Имя пользователя:</strong> <?php echo htmlspecialchars($user['name'])?></p>
            <p><strong>Пароль:</strong> <?php echo htmlspecialchars($user['password'])?></p>
            <a type="button" class="btn btn-danger mt-3" href="/prog/profile/delete_user">Удалить пользователя</a>
            <a type="button" class="btn btn-warning mt-3 ml-2" href="/prog/profile/change_password">Изменить пароль</a>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>