<?php

require_once basePath('App/Database/DatabaseConnection.php');

class Utilisateur
{

    private int $id = 0;
    private string $fullName = "";
    private string $email = "";
    private string $password = "";
    private Role $role;
    private string $photo = "";
    private Project $project;
    private string $bio = "";
    private array $competence = [];
    private string $portfolio = "";
    private int $tauxhoraire = 0;


    public function __construct()
    {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function getCompetence(): array
    {
        return $this->competence;
    }

    public function getPortfolio(): string
    {
        return $this->portfolio;
    }

    public function getTauxhoraire(): int
    {
        return $this->tauxhoraire;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    public function setProject(Project $project): void
    {
        $this->project = $project;
    }

    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }

    public function setCompetence(array $competence): void
    {
        $this->competence = $competence;
    }

    public function setPortfolio(string $portfolio): void
    {
        $this->portfolio = $portfolio;
    }

    public function setTauxhoraire(int $tauxhoraire): void
    {
        $this->tauxhoraire = $tauxhoraire;
    }

    public function register($first_name, $last_name, $age, $email, $password): void
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO "users" (first_name, last_name, age, email, password) VALUES (:first_name, :last_name, :age, :email, :password)';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
    }

    public function connecter($email)
    {
        $query = 'SELECT * FROM "users" WHERE email = :email';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user ?: null;
    }

}