<?php
use App\Services\page;
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
    <?php
        page::part('registration')
    ?>

</body>
</html>