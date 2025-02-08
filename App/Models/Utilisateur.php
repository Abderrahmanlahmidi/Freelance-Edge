<?php

class Utilisateur {

    private int $id = 0;
    private string $fullName ="";
    private Role $role ;
    private string $photo ="";
    private Project $project ;
    private string $bio ="" ; 
    private array $competence = [];
    private string $portfolio =""; 
    private int $tauxhoraire =0 ;
    
    

    public function __construct()
    {
        
    }

    public function getId ():int
    {
        return $this->id ;
    }
    public function getFullName ():string
    {
        return $this->fullName ;
    }
    public function getRole ():Role
    {
        return $this->role ;
    }
    public function getPhoto ():string
    {
        return $this->photo ;
    }
    public function getProject ():Project
    {
        return $this->project ;
    }
    public function getCompetence ():array
    {
        return $this->competence ;
    }
    public function getPortfolio ():string
    {
        return $this->portfolio ;
    }
    public function getTauxhoraire ():int
    {
        return $this->tauxhoraire ;
    }
    public function getBio ():string
    {
        return $this->bio ;
    }

    public function setFullName (string $fullName):void
    {
        $this->fullName = $fullName;
    }
    public function setRole (Role $role):void
    {
        $this->role = $role;
    }
    public function setPhoto (string $photo):void
    {
        $this->photo = $photo;
    }
    public function setProject (Project $project):void
    {
        $this->project = $project;
    }
    public function setBio (string $bio):void
    {
        $this->bio = $bio;
    }
    public function setCompetence (array $competence):void
    {
        $this->competence = $competence;
    }
    public function setPortfolio (string $portfolio):void
    {
        $this->portfolio = $portfolio;
    }
    public function setTauxhoraire (int $tauxhoraire):void
    {
        $this->tauxhoraire = $tauxhoraire;
    }
    
    




}