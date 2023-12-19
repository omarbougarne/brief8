<?php
class Category {
    private $id_cat;
    private $name_cat;
    private $image_cat;
    private $description_cat;

    public function __construct($id_cat,
    $name_cat,
    $image_cat,
    $description_cat) {
        $this->id_cat = $id_cat;
        $this->name_cat = $name_cat;
        $this->image_cat = $image_cat;
        $this->description_cat= $description_cat;
    }


    public function getIdcat() { return $this->id_cat; }
    public function getNamecat() { return $this->name_cat; }
    public function getImagecat() { return $this->image_cat; }
    public function getDescrcat() { return $this->description_cat; }
}
?>
