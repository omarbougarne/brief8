<?php
require_once 'db_config.php';
class AddProductForm {
    public function renderForm() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <title>Add Product</title>
        </head>
        <body>
            <div class="container mt-5">
                <h2>Add Product</h2>
                <form action="process_add_product.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="reference">Reference:</label>
                        <input type="text" class="form-control" id="reference" name="reference" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="codebar">Codebar:</label>
                        <input type="text" class="form-control" id="codebar" name="codebar" required>
                    </div>
                    <div class="form-group">
                        <label for="price_init">Price (Init):</label>
                        <input type="number" class="form-control" id="price_init" name="price_init" required>
                    </div>
                    <div class="form-group">
                        <label for="price_fin">Price (Final):</label>
                        <input type="number" class="form-control" id="price_fin" name="price_fin" required>
                    </div>
                    <div class="form-group">
                        <label for="quantite_min">Quantity (Min):</label>
                        <input type="number" class="form-control" id="quantite_min" name="quantite_min" required>
                    </div>
                    <div class="form-group">
                        <label for="quantite_stock">Quantity (Stock):</label>
                        <input type="number" class="form-control" id="quantite_stock" name="quantite_stock" required>
                    </div>
                    <div class="form-group">
                        <label for="reduc">Reduction (%):</label>
                        <input type="number" class="form-control" id="reduc" name="reduc" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    }

    public function processForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize form inputs
            $reference = $this->sanitizeInput($_POST["reference"]);
            $name = $this->sanitizeInput($_POST["name"]);
            $codebar = $this->sanitizeInput($_POST["codebar"]);
            $price_init = $this->sanitizeInput($_POST["price_init"]);
            $price_fin = $this->sanitizeInput($_POST["price_fin"]);
            $quantite_min = $this->sanitizeInput($_POST["quantite_min"]);
            $quantite_stock = $this->sanitizeInput($_POST["quantite_stock"]);
            $reduc = $this->sanitizeInput($_POST["reduc"]);
            $description = $this->sanitizeInput($_POST["description"]);

            // Validate other form fields as needed

            // Create a new Product instance with the form data
            $product = new Product($reference, $name, $_FILES["image"]["tmp_name"], $codebar, $price_init, $price_fin, $quantite_min, $quantite_stock, $reduc, $description, 1);

            // Insert the product into the database using ProductDAO
            $productDAO = new ProductDAO();
            $productDAO->insert_product($product);
        }
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
}

$addProductForm = new AddProductForm();
$addProductForm->processForm();
$addProductForm->renderForm();
?>
