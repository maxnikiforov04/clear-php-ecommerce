<?php
use App\Controllers\cart_controller;
use App\Services\page;

$method = $_SERVER['REQUEST_METHOD'];
$product_id = (int)$_GET['product_id'];
$controller = new cart_controller();
$product = $controller->singleCart($product_id)->fetch(PDO::FETCH_ASSOC);
$category = $controller->category($product['categoryId'])->fetch(PDO::FETCH_ASSOC);
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
</head>
<body>
<?php page::part('header'); ?>
    <div class="container mt-5">
        <h2>Информация о товаре</h2>
        <div class="card">
            <img src=".<?php echo $product['image']?>" height="200px" class="card-img-top" alt="Название товара">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['name'])?></h5>
                <p class="card-text"><strong>Цена:</strong> <?php echo htmlspecialchars($product['price'])?> $</p>

                <?php
                    if($product['categoryId'] != null){
                        ?>
                        <p class="card-text"><strong>Категория:</strong><?php echo htmlspecialchars($category['name']) ?></p>
                        <?php
                    }else{
                ?>
                        <div></div>
                        <?php
                    }?>
                <p class="card-text"><strong>Описание:</strong> <?php echo htmlspecialchars($product['description']) ?></p>
            </div>
        </div>
    </div>
</body>
</html>