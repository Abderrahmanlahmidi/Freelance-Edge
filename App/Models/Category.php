<?php



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


}