<?php
class Product {
    private $reference;
    private $name_prod;
    private $image_prod;
    private $codebar;
    private $priceinit;
    private $pricefin;
    private $reduc;
    private $description;
    private $quantite_min;
    private $quantite_stock;
    // private $catg;

    public function __construct($reference, $name_prod, $image_prod, $codebar, $priceinit, $pricefin, $reduc, $description, $quantite_min,$quantite_stock) {
        $this->reference = $reference;
        $this->name_prod = $name_prod;
        $this->image_prod = $image_prod;
        $this->codebar = $codebar;
        $this->priceinit = $priceinit;
        $this->pricefin = $pricefin;
        $this->reduc = $reduc;
        $this->description = $description;
        $this->quantite_min = $quantite_min;
        $this->quantite_stock = $quantite_stock;
        // $this->catg = $catg;
    }

    // Getters for all properties
    public function getReference() { return $this->reference; }
    public function getNameprod() { return $this->name_prod; }
    public function getImage() { return $this->image_prod; }
    public function getCodebar() { return $this->codebar; }
    public function getPriceinit() { return $this->priceinit; }
    public function getPrixFinal() { return $this->pricefin; }
    public function getReduc() { return $this->reduc; }
    public function getDescription() { return $this->description; }
    public function getQuantitemin() { return $this->quantite_min; }
    public function getQuantitestock() { return $this->quantite_stock; }
    // public function getCatg() { return $this->catg; }
}
?>
