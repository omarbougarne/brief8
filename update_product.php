<?php
require_once 'ProductDAO.php';
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reference = $_POST['reference'];

    // Fetch the product details
    $productDAO = new ProductDAO();
    $product = $productDAO->get_product_by_ref($reference);

    // Display the form for updating the product
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Update Product</title>
    </head>
    <body>
        <div class="container mt-5">
            <h2>Update Product</h2>
            <form action="process_update_product.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="reference">Reference:</label>
                    <input type="text" class="form-control" id="reference" name="reference" value="<?php echo $product->getReference(); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $product->getNameprod(); ?>" required>
                </div>
                <div class="main-img"><img src="data:image/jpg;base64,<?php echo base64_encode($product->getImage()); ?>" alt="<?php echo $product->getNameprod(); ?>"></div>
                <<div class="form-group">
                <label for="codebar">Codebar:</label>
                <input type="text" class="form-control" id="codebar" name="codebar" value="<?php echo $product->getCodebar(); ?>" required>
            </div>
            <div class="form-group">
                <label for="priceinit">Initial Price:</label>
                <input type="number" class="form-control" id="priceinit" name="priceinit" value="<?php echo $product->getPriceinit(); ?>" required>
            </div>
            <div class="form-group">
                <label for="pricefin">Final Price:</label>
                <input type="number" class="form-control" id="pricefin" name="pricefin" value="<?php echo $product->getPrixFinal(); ?>" required>
            </div>
            <div class="form-group">
                <label for="reduc">Reduction (%):</label>
                <input type="number" class="form-control" id="reduc" name="reduc" value="<?php echo $product->getReduc(); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $product->getDescription(); ?></textarea>
            </div>
            <div class="form-group">
                <label for="quantitemin">Minimum Quantity:</label>
                <input type="number" class="form-control" id="quantitemin" name="quantitemin" value="<?php echo $product->getQuantitemin(); ?>" required>
            </div>
            <div class="form-group">
                <label for="quantitestock">Stock Quantity:</label>
                <input type="number" class="form-control" id="quantitestock" name="quantitestock" value="<?php echo $product->getQuantitestock(); ?>" required>
            </div>


                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}
?>

