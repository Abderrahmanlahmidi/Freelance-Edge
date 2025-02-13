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


    public function createOffre(){

    }

    public function updateOffre(){

    }

    public function deleteOffre(){

    }

    public function getOffres(){

    }



    public function getAllOffres(): array
    {
        try {
            $query = "";
            $stmt = DatabaseConnection::getInstance()->prepare($query);
            $stmt->execute();

            $offres = [];
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $offre = new Offre();
                $offre->setId($row->id);
                $offre->setTitre($row->titre);
                $offre->setDescriptionOffre($row->description);
                $offre->setBudget($row->budget);
                $offre->setDuree($row->duree);
                $offre->setPhoto($row->photo);
                $offre->setRoleId($row->user_id);
                $offre->setRole(new Role($row->user_id, $row->firsname));
                $offres[] = $offre;
            }
            
            return $offres;
        } catch (PDOException $e) {
            error_log("Database error:" . $e->getMessage());
            return [];
        }
    }


}