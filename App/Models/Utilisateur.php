<?php

class Utilisateur
{

    private int $id = 0;
    private string $fullName = "";
    private Role $role;
    private string $email;
    private string  $password;
    private string  $passwordConfirmation;
    private string $photo = "";
    private Project $project;
    private string $bio = "";
    private array $competence = [];
    private string $portfolio = "";
    private int $role_id = 0;
    private int $tauxhoraire = 0;



    public function __construct() {}

    public static function instance(string $fullName , string $email, string $password , string $passwordConfirmation ,string $photo , int $role_id ,Role $role , Project $project, string $bio)
    {
        $instance = new self();
        $instance->fullName = $fullName ; 
        $instance->email = $email ; 
        $instance->password = $password ; 
        $instance->passwordConfirmation = $passwordConfirmation ; 
        $instance->photo = $photo ;
        $instance->role= $role ;   
        $instance->project= $project ;   
        $instance->bio= $bio ;   
        $instance->role_id= $role_id ;   
  
  
        return $instance ; 
     }


    public static function instanceWithEmailAndPassword(string $email, string $password)
    {
        $instance = new self ();
        $instance->email = $email ;
        $instance->password = $password ;

        return $instance ; 
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
    public function getRoleId(): int
    {
        return $this->role_id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function setRoleId(int $role_id): void
    {
        $this->role_id = $role_id;
    }
    public function setEmail(int $email): void
    {
        $this->email = $email;
    }
    public function setPassword(int $password): void
    {
        $this->password = $password;
    }


    public function createUser() {}
}
