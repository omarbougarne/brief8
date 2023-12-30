<?php
require_once 'productdao.php';
$productDAO = new ProductDAO();
$products = $productDAO->get_product();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light  bg-primary">
    <a class="navbar-brand" href="pd.php">Your Brand</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="addproductoop.php">Add Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="update_product.php">Update Product</a>
            </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-100">
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="col-md-4 col-sm-6">
          <div class="card mb-30">
            <a  href="#" data-abc="true">
              <div class="inner">
                <div class="main-img"><img src="data:image/jpg;base64,<?php echo base64_encode($product->getImage()); ?>" alt="<?php echo $product->getNameprod(); ?>"></div>
                <div class="thumblist"></div>
              </div>
            </a>
            <div class="card-body text-center">
              <h4 class="card-title"><?php echo $product->getNameprod(); ?></h4>
              <p class="text-muted">Starting from $<?php echo $product->getPriceinit(); ?></p>
              <a class="btn btn-outline-primary btn-sm" href="detail.php?reference=<?php echo $product->getReference(); ?>" data-abc="true">View Product</a>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<footer class="footer mt-5 bg-primary text-white text-center">
    <div class="container">
      <p>&copy; 2023 Your Brand. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>