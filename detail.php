<?php
require_once 'productdao.php';
require_once 'db_config.php';

if (isset($_GET['reference'])) {
    $productDAO = new ProductDAO();
    $reference = $_GET['reference'];
    $product = $productDAO->get_product_by_ref($reference);

    if ($product) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title><?php echo $product->getNameprod(); ?> - Product Detail</title>
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-light  bg-primary">
                <a class="navbar-brand" href="pd.php">Your Brand</a>
            </nav>
            <div class="container mt-100">
                <div class="row">
                    <div class="col-md-12">
                        <div class>
                            <div class="" >
                                
                                    
                                        <img style="width: 50%;" src="data:image/jpg;base64,<?php echo base64_encode($product->getImage()); ?>" alt="<?php echo $product->getNameprod(); ?>">

                                    
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h4 class="card-title"><?php echo $product->getNameprod(); ?></h4>
                                <p class="text-muted">Price: $<?php echo $product->getPriceinit(); ?></p>
                                <p class="text-muted">Description: <?php echo $product->getDescription(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer mt-5 bg-primary text-white text-center">
                <div class="container">
                    <p>&copy; 2023 Your Brand. All rights reserved.</p>
                </div>
            </footer>
        </body>
        </html>
        <?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product reference.";
}
?>

</body>
</html>