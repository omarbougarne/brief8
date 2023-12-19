<?php
require_once("db_config.php");
require_once("catpoo.php");


class CatDAO {
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_cat(){
        $query = "SELECT * FROM category";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $catData = $stmt->fetchAll();
        $Category = array();
        foreach ($catData as $C) {
            $Category[] = new Category(
                $C["id_cat"],
                $C["name_cat"],
                $C["image_cat"],
                $C["description_cat"]
            );
        }
        
        return $Category;

    }
    public function insert_category($Category)
    {
        $query = "INSERT INTO category (id_cat, name_cat, image_cat, description_cat)  
                  VALUES (:id_cat, :name_cat, :image_cat, :description_cat)";

        $stmt = $this->db->prepare($query);

        $id_cat = $Category->getIdcat();
        $name_cat = $Category->getNamecat();
        $image_cat = $Category->getImagecat();
        $description_cat = $Category->getDescrcat();

        $stmt->bindParam(':id_cat', $id_cat);
        $stmt->bindParam(':name_cat', $name_cat);
        $stmt->bindParam(':image_cat', $image_cat); 
        $stmt->bindParam(':description_cat', $description_cat); 


        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
       
}
public function update_category($Category)
    {
        $query = "UPDATE category SET 
                  id_cat = :id_cat, 
                  name_cat = :name_cat,
                  image_cat = :image_cat,
                  description_cat = :description_cat
                  WHERE id_cat = :id_cat";

        $stmt = $this->db->prepare($query);

        $id_cat = $Category->getIdcat();
        $name_cat = $Category->getNamecat();
        $image_cat = $Category->getImagecat();
        $description_cat = $Category->getDescrcat();

        $stmt->bindParam(':id_cat', $id_cat);
        $stmt->bindParam(':name_cat', $name_cat);
        $stmt->bindParam(':image_cat', $image_cat);
        $stmt->bindParam(':description_cat', $description_cat);
        
        try {
            $stmt->execute();
            echo "Record updated successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function delete_category($name_cat)
    {
        $query = "DELETE FROM users WHERE name_cat = :name_cat;";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':username', $name_cat);

        try {
            $stmt->execute();
            echo "Record deleted successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
// $user = new User('username@gmail.com','name','passipass');
// $userDAO->insert_user(34);
?>