<?php

require_once basePath("App/Database/DatabaseConnection.php");

class Offre
{
    private int $id;

    private string $titre;

    private string $descriptionOffre;
    private string $budget;
    private int $duree ;
    private string $photo;
    private Utilisateur $client ; 


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

    public function getBudget()
    {
 
    }
    public function setBudget()
    {

    }


    public function createOffre(){

    }

    public function updateOffre(){

    }

    public function deleteOffre(){

    }

    public function getOffres(){

    }



   


}