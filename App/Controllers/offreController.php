<?php
require_once __DIR__ . '/../../helpers.php';

require_once basePath("App/Models/Offre.php");

Class OffreController{

    private $offreModel;

    public function __construct()
    {
        $this->offreModel = new Offre();
    }

    public function getOffresController(){
         $offers = $this -> offreModel -> getOffres();
        require_once basePath("App/Views/Pages/offreView.php");
    }

    public function getAllOffres():array
    {
        $offre = $this->offreModel->getAllOffres();
        // require_once basePath("/App/Views/frelancer/offres.php");
        return $offre;
    }

}