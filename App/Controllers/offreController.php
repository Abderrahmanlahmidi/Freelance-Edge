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

}