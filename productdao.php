<?php
include("db_config.php");
include("Product.php");


class ProductDAO {
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_product(){
        $query = "SELECT * FROM product";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $productData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $products = array();
        foreach ($productData as $P) {
            $products[] = new Product(
                $P["reference"],
                $P["name_prod"],
                $P["image_prod"],
                $P["codebar"], 
                $P["price_init"],
                $P["price_fin"],
                $P["reduc"],
                $P["description"],
                $P["quantite_min"],
                $P["quantite_stock"]
            );
        }
        return $products;
    }
    
    public function insert_product($Product)
    {
        $query = "INSERT INTO products (reference, etiquette, descpt, codeBarres, img, prixAchat, prixFinal, prixOffre, qntMin, qntStock, catg) 
                  VALUES (:reference, :etiquette, :descpt, :codeBarres, :img, :prixAchat, :prixFinal, :prixOffre, :qntMin, :qntStock, :catg)";

        $stmt = $this->db->prepare($query);

        $reference = $Product->getReference();
        $etiquette = $Product->getEtiquette();
        $descpt = $Product->getDescpt();
        $codeBarres = $Product->getCodeBarres();
        $img = $Product->getImg();
        $prixAchat = $Product->getPrixAchat();
        $prixFinal = $Product->getPrixFinal();
        $prixOffre = $Product->getPrixOffre();
        $qntMin = $Product->getQntMin();
        $qntStock = $Product->getQntStock();
        $catg = $Product->getCatg();

        $stmt->bindParam(':reference', $reference);
        $stmt->bindParam(':etiquette', $etiquette);
        $stmt->bindParam(':descpt', $descpt);
        $stmt->bindParam(':codeBarres', $codeBarres);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':prixAchat', $prixAchat);
        $stmt->bindParam(':prixFinal', $prixFinal);
        $stmt->bindParam(':prixOffre', $prixOffre);
        $stmt->bindParam(':qntMin', $qntMin);
        $stmt->bindParam(':qntStock', $qntStock);
        $stmt->bindParam(':catg', $catg);


        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
       
}
public function update_product($Product)
    {
        $query = "UPDATE products SET 
                  etiquette = :etiquette, 
                  descpt = :descpt,
                  codeBarres = :codeBarres,
                  img = :img,
                  prixAchat = :prixAchat,
                  prixFinal = :prixFinal,
                  prixOffre = :prixOffre,
                  qntMin = :qntMin,
                  qntStock = :qntStock,
                  catg = :catg
                  WHERE reference = :reference";

        $stmt = $this->db->prepare($query);

        $reference = $Product->getRef();
        $etiquette = $Product->getEtqt();
        $descpt = $Product->getDesc();
        $codeBarres = $Product->getCode_barre();
        $img = $Product->getImgProd();
        $prixAchat = $Product->getPr_ach();
        $prixFinal = $Product->getPr_fin();
        $prixOffre = $Product->getOffre_pr();
        $qntMin = $Product->getQte_min();
        $qntStock = $Product->getQte_stock();
        $catg = $Product->getCatg();

        $stmt->bindParam(':reference', $reference);
        $stmt->bindParam(':etiquette', $etiquette);
        $stmt->bindParam(':descpt', $descpt);
        $stmt->bindParam(':codeBarres', $codeBarres);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':prixAchat', $prixAchat);
        $stmt->bindParam(':prixFinal', $prixFinal);
        $stmt->bindParam(':prixOffre', $prixOffre);
        $stmt->bindParam(':qntMin', $qntMin);
        $stmt->bindParam(':qntStock', $qntStock);
        $stmt->bindParam(':catg', $catg);

        try {
            $stmt->execute();
            echo "Record updated successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function delete_product($id)
    {
        $query = "UPDATE products SET isHide = 1 WHERE reference = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            echo "Record deleted successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
public function get_product_by_ref($reference) {
    try {
        $query = ("SELECT * FROM product WHERE reference = '".$reference."'");
        $stmt = $this->db->query($query);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            return new Product($product['reference'],$product['name_prod'], $product['image_prod'], $product['codebar'], $product['price_init'], $product['price_fin'],$product['reduc'],$product['description'], $product['quantite_min'], $product['quantite_stock'],  $product['fk_idcat']);
        } else {
            return null; 
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}
}

$productDAO = new productDAO();
$productDAO->get_product();
?>