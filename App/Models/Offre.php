<?php

require_once basePath("App/Database/DatabaseConnection.php");

class Offre
{
    private int $id;
    private string $titre;
    private string $descriptionOffre;
    private string $budget;
    private int $duree;
    private string $photo;
    private Utilisateur $client;

    public function __construct() {}

    public function getId(): int
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
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

    public function getBudget(): int
    {
        return $this->budget;
    }
    public function setBudget(int $budget)
    {
        $this->budget = $budget;
    }

    public function getDuree(): string
    {
        return $this->duree;
    }
    public function setDuree(string $duree)
    {
        $this->duree = $duree;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }
    public function setPhoto(string $photo)
    {
        $this->photo = $photo;
    }

    public function getClient(): Utilisateur
    {
        return $this->client;
    }
    public function setClient(Utilisateur $client)
    {
        $this->client = $client;
    }


    public function createOffre($title, $description)
    {
        $query = 'INSERT INTO "offers" (title, description) VALUES (:titre, :description)';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':titre', $title);
        $stmt->bindValue(':description', $description);
        $stmt->execute();
    }

    public function updateOffre($id, $titre, $descriptionf)
    {
        $query = 'UPDATE "offers" SET title = :titre, description = :description WHERE id = :id';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':titre', $titre);
        $stmt->bindValue(':description', $descriptionf);
        $stmt->execute();
    }

    public function deleteOffre($id)
    {
        $query = 'DELETE FROM "offers" WHERE id = :id';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getOffres()
    {
        $query = 'SELECT * FROM "offers"';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllOffres(): array
    {
        try {
            $query = "";
            $stmt = DatabaseConnection::getInstance()->prepare($query);
            $stmt->execute();

            $offres = [];
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $offre = new offre();
                $offre->setId($row->id);
                $offre->setTitre($row->titre);
                $offre->getDescriptionOffre($row->description);
                $offre->setBudget($row->budget);
                $offre->setDuree($row->duree);
                $offre->setClient($row->user_id);
                // $project->setuser(new Utilisateur($row->user_id, $row->firsname));
                $offres[] = $offre;
            }

            return $offres;
        } catch (PDOException $e) {
            error_log("Database error:" . $e->getMessage());
            return [];
        }
    }
}
