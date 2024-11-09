<?php
use App\Services\page;
if (!isset($_COOKIE['cart'])) {
    $all_products = [];
} else {
    $all_products = json_decode($_COOKIE['cart'], true);
    print_r($all_products);
}
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
        <div class="card m-2" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <h4><?php echo htmlspecialchars($product['price']); ?></h4>
                </div>
                <div class="d-flex justify-content-between">
                    <form method="get" action="/prog/product/">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Buy</button>
                        </div>
                    </form>
                    <form method="post" action="/prog/cart/remove_product">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>