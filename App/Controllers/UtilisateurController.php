<?php

require __DIR__ . '/../../App/Models/Utilisateur.php';
require __DIR__ . '/../../App/Models/Role.php';

class UtilisateurController
{

    private Utilisateur $userModel;

    public function __construct()
    {
        $this->userModel = new Utilisateur();
    }

    public function addUser()
    {
        if (isset($_POST['submit'])) {
            $fullName = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role_id = $_POST['role'];
            $bio = $_POST['bio'] ?? '';
            $competence = $_POST['competence'] ?? [];
            $portfolio = $_POST['portfolio'] ?? '';
            $tauxhoraire = $_POST['tauxhoraire'] ?? 0;

            $photo = 'default.jpg';
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $photoName = uniqid() . '_' . basename($_FILES['photo']['name']);
                $photoPath = $uploadDir . $photoName;
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
                    $photo = $photoName;
                }
            }

            try {
                $user = new Utilisateur();
                $user->setFullName($fullName);
                $user->setPhoto($photo);
                $user->setEmail($email);
                $user->setBio($bio);
                $user->setCompetence($competence);
                $user->setPortfolio($portfolio);
                $user->setTauxhoraire($tauxhoraire);
                $user->setPassword($password);
                $user->setRoleId($role_id);

                $user->createUser($user);

                header('Location: users.php');
                exit;
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }


    public function getAllUsers(): array
    {
        return $this->userModel->getAllUsers();
    }

    public function deleteUser(int $id)
    {
        try {

        $this->userModel->deleteUser($id);
        header("Location: users.php");
        exit();
        } catch (Exception $e) {
            echo "eroor" . $e->getMessage();
        }
    }

    public function updateUser()
    {
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $fullname = $_POST['editfullname'];
            $email = $_POST['editemail'];
            $photo = $_POST['editphoto'];
            $bio = $_POST['editbio'];
            $project = $_POST['editproject'];
            $competence = $_POST['editcompetence'];
            $portfolio = $_POST['editportfolio'];
            $role_id = $_POST['editrole_id'];
            $tauxhoraire = $_POST['edittauxhoraire'];

            $ediuser = new Utilisateur();
            $ediuser->setFullName($fullname);
            $ediuser->setEmail($email);
            $ediuser->setPhoto($photo);
            $ediuser->setBio($bio);
            $ediuser->setProject($project);
            $ediuser->setCompetence($competence);
            $ediuser->setPortfolio($portfolio);
            $ediuser->setRoleId($role_id);
            $ediuser->setTauxhoraire($tauxhoraire);

            if ($this->userModel->updateUser($ediuser)) {
                header("Location: users.php");

                exit();
            } else {
                echo " eroror updating ";
            }
        }
    }

    public function findUserById(int $id) 
    {
        return $this->userModel->findUserById($id);
    }
}
