<?php

// require_once basePath('App/Models/Utilisateur.php');





class Message
{

    private int $id;
    private Utilisateur $expediteur;
    private Utilisateur $destinateur;
    private string $dateSoumission;
    


    public function __construct(
        int $id,
        Utilisateur $Expediteur,
        Utilisateur $destinateur,
        string $dateSoumission,
        
    ) {
        $id = $this->id;
        $expediteur = $this->expediteur;
        $destinateur = $this->destinateur;
        $dateSoumission = $this->dateSoumission;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getExpediteur(): Utilisateur
    {
        return $this->expediteur;
    }
    public function getDestinateur(): Utilisateur
    {
        return $this->destinateur;
    }
    public function getDateSoumission(): string
    {
        return $this->dateSoumission;
    }

    public function setExpediteur(Utilisateur $expediteur): void
    {
         $this->expediteur = $expediteur;
    }
    public function setDestinateur(Utilisateur $destinateur): void
    {
         $this->destinateur = $destinateur;
    }
    public function setDateSoumission(string $dateSoumission): void
    {
         $this->dateSoumission = $dateSoumission;
    }
    


    


    public function creteMessage() {}
    public function afficherMessage() {}


    
}



