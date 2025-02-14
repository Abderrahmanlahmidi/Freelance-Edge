<?php

require_once basePath("App/Database/DatabaseConnection.php");

class Category{

    private int $id = 0;
    private string $category = "";

    public function construct(){

    }

    public function getId(): int{
        return $this -> id;
    }

    public function setCategory(string $category){
        $this -> category = $category;
    }

    public function getCategory(): string{
        return $this -> category;
    }

    public function createCategory(){
        

    }

    public function updateCategory(){

    }
    public function deleteCategory(){

    }

    public function getCategories(){

    }

    public function getCategoryById(int $id){
        $query = 'SELECT * FROM "Categorys" WHERE id = :id';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public function getAllCategories(){
        $query = 'SELECT * FROM "Categorys"';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Category");
        return $stmt;
    }

    public function deleteCategoryById(int $id){
        $query = 'DELETE FROM "Categorys" WHERE id = :id';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function createCategory($category){
        $query = 'INSERT INTO "Categorys" ("category") VALUES (:category)';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':category', $this->category, PDO::PARAM_STR);
        $stmt->execute();
    }


}