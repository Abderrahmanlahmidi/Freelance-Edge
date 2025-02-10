<?php

class Project {
    private int $id;
    private string $title;
    private string $description;
    private int $budget;
    private int $duree;
    private Category $category;
    private Utilisateur $creatorProject;


    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }


    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }


    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }


    public function getBudget(): int {
        return $this->budget;
    }

    public function setBudget(int $budget): void {
        $this->budget = $budget;
    }


    public function getDuree(): int {
        return $this->duree;
    }

    public function setDuree(int $duree): void {
        $this->duree = $duree;
    }


    public function getCategory(): Category {
        return $this->category;
    }

    public function setCategory(Category $category): void {
        $this->category = $category;
    }


    public function getCreatorProject(): Utilisateur {
        return $this->creatorProject;
    }

    public function setCreatorProject(Utilisateur $creatorProject): void {
        $this->creatorProject = $creatorProject;
    }

    public function getProjects() {

    }

    public function searchProjects(string $search) {

    }
    public function getProjectById(int $id) {

    }
    public function createProject(){

    }
    public function updateProject(){

    }
    public function deleteProject(){

    }

}
?>
