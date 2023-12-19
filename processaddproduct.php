<?php

include("Product.php");
include("ProductDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $reference = htmlspecialchars(strip_tags(trim($_POST["reference"])));
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $codebar = htmlspecialchars(strip_tags(trim($_POST["codebar"])));
    $price_init = intval($_POST["price_init"]);
    $price_fin = intval($_POST["price_fin"]);
    $quantite_min = intval($_POST["quantite_min"]);
    $quantite_stock = intval($_POST["quantite_stock"]);
    $reduc = intval($_POST["reduc"]);
    $description = htmlspecialchars(strip_tags(trim($_POST["description"])));

    // Validate other form fields as needed

    // Create a new Product instance with the form data
    $product = new Product($reference, $name, $_FILES["image"]["tmp_name"], $codebar, $price_init, $price_fin, $quantite_min, $quantite_stock, $reduc, $description, 1);

    // Insert the product into the database using ProductDAO
    $productDAO = new ProductDAO();
    $productDAO->insert_product($product);

    // Redirect to a success page or any other page as needed
    header("Location: success_page.php");
    exit();
} else {
    // Redirect to an error page or handle the error as needed
    header("Location: error_page.php");
    exit();
}
?>
