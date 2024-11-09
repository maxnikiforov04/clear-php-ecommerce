<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Смена пароля</title>
</head>
<body>
<form class="container mt-5" method="post" action="/prog/profile/new_password">
    <h2>Смена пароля</h2>
    <form id="changePasswordForm">
        <div class="form-group">
            <label for="newPassword">Новый пароль</label>
            <input type="password" class="form-control" name="pass" id="newPassword" placeholder="Введите новый пароль" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Подтверждение нового пароля</label>
            <input type="password" class="form-control" name="checkPass" id="confirmPassword" placeholder="Подтвердите новый пароль" required>
        </div>
        <button type="submit" class="btn btn-primary">Сменить пароль</button>
    </form>
</form>


</body>
</html>