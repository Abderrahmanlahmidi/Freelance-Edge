<?php


// require_once __DIR__ . '/../../App/Models/Project.php';


require_once basePath('App/Database/DatabaseConnection.php');

class Utilisateur
{


    public int $id = 0;
    public string $fullName = "";
    public Role $role;
    public string $email;
    public string $password;
    public string $passwordConfirmation;
    public string $photo = "";
    public string $project = "";
    public string $bio = "";
    public array $competence = [];
    public string $portfolio = "";
    public int $role_id = 0;
    public int $rolename;
    public int $tauxhoraire = 0;



    public function __construct() {}

    public static function instance(string $fullName, string $email, string $password, string $passwordConfirmation, string $photo, int $role_id, Role $role, string $project, string $bio)
    {
        $instance = new self();
        $instance->fullName = $fullName;
        $instance->email = $email;
        $instance->password = $password;
        $instance->passwordConfirmation = $passwordConfirmation;
        $instance->photo = $photo;
        $instance->role = $role;
        $instance->project = $project;
        $instance->bio = $bio;
        $instance->role_id = $role_id;


        return $instance;
    }


    public static function instanceWithEmailAndPassword(string $email, string $password)
    {
        $instance = new self();
        $instance->email = $email;
        $instance->password = $password;

        return $instance;
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
        $query = "SELECT r.id, r.rolename FROM roles r WHERE r.id = :role_id";
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->execute(['role_id' => $this->role_id]);
        $roleData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($roleData) {
            return new Role($roleData['id'], $roleData['rolename']);
        }

        return new Role();

        return $this->role;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getProject(): string
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
    public function getPasswordConfirmation(): string
    {
        return $this->passwordConfirmation;
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

    public function setProject(string $project): void
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
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setPasswordConfirmation(int $passwordConfirmation): void
    {
        $this->passwordConfirmation = $passwordConfirmation;
    }


    public function createUser(Utilisateur $user)
    {
        $query = "INSERT INTO users (fullName, email, password, photo, bio, competence, portfolio, role_id, tauxhoraire) VALUES (:fullName, :email, :password, :photo, :bio, :competence, :portfolio, :role_id, :tauxhoraire)";

        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->execute([
            'fullName'    => $user->getFullName(),
            'email'       => $user->getEmail(),
            'password'    => $user->getPassword(),
            'photo'       => $user->getPhoto(),
            'bio'         => $user->getBio(),
            'competence'  => '{' . implode(',', array_map(fn($c) => '"' . $c . '"', $user->getCompetence())) . '}',
            'portfolio'   => $user->getPortfolio(),
            'role_id'     => $user->getRoleId(),
            'tauxhoraire' => $user->getTauxhoraire()
        ]);

        $user->setId(DatabaseConnection::getInstance()->lastInsertId());

        return $user;
    }

    public function register($first_name, $last_name, $age, $email, $password): void
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO "users" (firstname, lastname, age, email, password) VALUES (:firstname, :lastname, :age, :email, :password)';
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->bindParam(':firstname', $first_name);
        $stmt->bindParam(':lastname', $last_name);
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

    public function getAllUsers(): array
    {
        try {
            $query = "
            SELECT 
                u.*,
                r.rolename as role_name
            FROM users u
            LEFT JOIN roles r ON u.role_id = r.id
        ";
            $stmt = DatabaseConnection::getInstance()->prepare($query);
            $stmt->execute();



            $users = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = new Utilisateur();
                $user->setId($row['id']);
                $user->setFullName($row['fullname']);
                $user->setEmail($row['email']);
                $user->setPassword($row['password']);
                $user->setPhoto($row['photo']);
                $user->setRoleId($row['role_id']);
                $user->setRole(new Role($row['role_id'], $row['role_name']));

                $users[] = $user;
            }

            return $users;
        } catch (PDOException $e) {
            error_log("Database error:" . $e->getMessage());
            return [];
        }
    }



    public function deleteUser(int $id)
    {
        try {
            $query = "DELETE FROM users WHERE id = :id";

            $stmt = DatabaseConnection::getInstance()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("eroro delete" . $e->getMessage());
            return false;
        }
    }

    public function updateUser(Utilisateur $user): bool
    {
        try {
            $query = "UPDATE users SET 
            fullName = :fullName,
            email = :email,
            password = :password,
            photo = :photo,
            role_id = :role_id
            WHERE id = :id";

            $stmt = DatabaseConnection::getInstance()->prepare($query);
            return $stmt->execute([
                'fullName' => $user->getFullName(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'photo' => $user->getPhoto(),
                'role_id' => $user->getRoleId(),
                'id' => $user->getId()
            ]);
        } catch (PDOException $e) {
            error_log("Error updating user: " . $e->getMessage());
            return false;
        }
    }

    public static function findUserById(int $id): Utilisateur
    {
        try {
            $query = "SELECT * FROM users WHERE id = :id";
            $stmt = DatabaseConnection::getInstance()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new Utilisateur();
            $user->setId($userData['id']);
            $user->setFullName($userData['fullname']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            $user->setPhoto($userData['photo']);
            $user->setRoleId($userData['role_id']);

            return $user;
        } catch (PDOException $e) {
            error_log("Error finding user: " . $e->getMessage());
            return null;
        }
    }
}
