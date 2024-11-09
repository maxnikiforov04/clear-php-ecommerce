<div class="container w-25">
    <h1 class="mb-3">Вход</h1>
    <form method="post" enctype="multipart/form-data" action="/prog/auth/login">
        <div class="mb-3">
            <h3><label for="username" class="form-label">Имя пользователя</label></h3>
            <input type="text" name="name" class="form-control" id="username" required>
        </div>
        <div class="mb-3">
            <h3><label for="password" class="form-label">Пароль</label></h3>
            <input type="password" name="pass" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Вход</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>