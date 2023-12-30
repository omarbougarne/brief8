<?php
require_once 'ProductDAO.php';

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
    $productDAO->update_product($product);
    
    // Redirect to the product listing page or show a success message
    header("Location: pd.php");
    exit();
}

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}
?>

