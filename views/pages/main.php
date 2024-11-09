<?php
use App\Services\page;
use App\Controllers\cart_controller;

$products = new cart_controller();
$all_products = $products->list()->fetchAll(PDO::FETCH_ASSOC); // Fetch all products
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
<div class="d-flex flex-wrap">
    <?php
    foreach ($all_products as $product) {
        ?>
        <div  class="card m-2" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                <?php
                if($product['categoryId']){
                    ?>
                    <p class="card-text"><?php echo htmlspecialchars($products->category($product['categoryId'])->fetch(PDO::FETCH_ASSOC)['name']); ?></p>
                    <?php
                } else {
                    ?>
                    <p class="card-text"></p>
                    <?php
                }
                ?>
                <h5><?php echo htmlspecialchars($product['price']); ?>$</h5>
                <?php
                    if($_SESSION){
                ?>
                <form method="post" action="/prog/cart/add_product">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                </form>
                <?php
                    }else{
                ?>
                        <form method="post" action="/prog/login">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </form>
                <?php
                    }
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>