<?php

require_once basePath("App/Database/DatabaseConnection.php");

class Offre
{
    private int $id;

    private string $titre;

    private string $descriptionOffre;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setTitre(string $titre)
    {
        $this->titre = $titre;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setDescriptionOffre(string $descriptionOffre)
    {
        $this->descriptionOffre = $descriptionOffre;
    }

    public function getDescriptionOffre(): string
    {
        return $this->descriptionOffre;
    }

    public function createOffre($title, $description){
        $query = 'INSERT INTO "offers" (title, description) VALUES (:titre, :description)';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':titre', $title);
        $stmt->bindValue(':description', $description);
        $stmt->execute();
    }

    public function updateOffre($id, $titre, $descriptionf){
        $query = 'UPDATE "offers" SET title = :titre, description = :description WHERE id = :id';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':titre', $titre);
        $stmt->bindValue(':description', $descriptionf);
        $stmt->execute();
    }

    public function deleteOffre($id){
        $query = 'DELETE FROM "offers" WHERE id = :id';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getOffres(){
        $query = 'SELECT * FROM "offers"';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}