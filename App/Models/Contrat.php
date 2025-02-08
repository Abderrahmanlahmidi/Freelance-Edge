<?php

class Contrat
{

    private int $id;
    private string $dateContrat;
    private Project $project;
    private Project $client;
    private Project $frelancer;


    public function __construct(
        int $id,
        string $dateContrat,
        Project $project,
        Project $client,
        Project $frelancer
    ) {
        $id = $this->id;
        $dateContrat = $this->dateContrat;
        $project = $this->project;
        $client = $this->client;
        $frelancer = $this->frelancer;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getDateContrat(): int
    {
        return $this->dateContrat;
    }
    public function getProject(): Project
    {
        return $this->project;
    }
    public function getClient(): Project
    {
        return $this->client;
    }
    public function getFrelancer(): Project
    {
        return $this->frelancer;
    }


    public function setFrelancer(Project $frelancer): void
    {
        $this->frelancer = $frelancer;
    }
    public function setClient(Project $client): void
    {
        $this->client = $client;
    }
    public function setProject(Project $project): void
    {
        $this->project = $project;
    }
    public function setDateContrat(int $dateContrat): void
    {
        $this->dateContrat = $dateContrat;
    }


    public function extraitContrat() {}
    public function UpdateContrat() {}


    public function __toString()
    {
        $id = $this->id;
        $dateContrat = $this->dateContrat;
        $project = $this->project;
        $client = $this->client;
        $frelancer = $this->frelancer;


        return "(Contrat) => id : " . $id . " , Contrat Project name : " . $project .
            " , client name : " . $client . " , frelancer name : " . $frelancer . " , dateContrat name : " . $dateContrat;
    }
}
