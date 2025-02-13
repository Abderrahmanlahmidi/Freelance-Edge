<?php

require_once basePath("App/Models/Offre.php");

Class OffreController{

    private $offreModel;

    public function __construct()
    {
        $this->offreModel = new Offre();
    }

    public function getOffresController(){
        $offres = $this -> offreModel -> getOffres();
        require_once basePath("App/Views/Pages/offreView.php");
    }

    public function getAllOffres()
    {
        $offre = $this->offreModel->getAllOffres();
        require_once basePath("/App/Views/frelancer/offres.php");
        return $offre;
    }

}