<?php
require_once 'db_config.php'; 
require_once 'catdao.php'; 
$catDAO = new CatDAO();
$categories = $catDAO->get_cat();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Category Page</title>
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
      </ul>
    </div>
  </nav>
<div class="container mt-100">
    <div class="row">
    <?php foreach ($categories as $category) : ?>
        <div class="col-md-4 col-sm-6">
            <div class="card mb-30">
                <a class="card-img-tiles" href="#" data-abc="true">
                    <div class="inner">
                        <div class="main-img">
                            <img style="height: 200px;" src="data:image/jpg;base64,<?php echo base64_encode($category->getImagecat()); ?>" alt="<?php echo $category->getNamecat(); ?>">
                        </div>
                    </div>
                </a>
                <div class="card-body text-center">
                    <h4 class="card-title"><?php echo $category->getNamecat(); ?></h4>
                    <p class="text-muted"><?php echo $category->getDescrcat(); ?></p>
                    <a class="btn btn-outline-primary btn-sm" href="pd.php" data-abc="true">View Products</a>
                </div>
            </div>
        </div>
    <?php  endforeach; ?>
    
    </div>
</div>
<footer class="footer mt-5 bg-primary text-white text-center">
    <div class="container">
      <p>&copy; 2023 Your Brand. All rights reserved.</p>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
