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
        if (isset($_POST['update'])) {
            try {

                $id = (int)$_POST['editid'];

                $user = Utilisateur::findUserById($id);
                $photo = $user->getPhoto();
                if (isset($_FILES['editphoto']) && $_FILES['editphoto']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $photoName = uniqid() . '_' . basename($_FILES['editphoto']['name']);
                    $photoPath = $uploadDir . $photoName;

                    if (move_uploaded_file($_FILES['editphoto']['tmp_name'], $photoPath)) {
                        $photo = $photoName;
                    }
                }
                $user->setId($id);
                $user->setFullName($_POST['editfullname']);
                $user->setEmail($_POST['editemail']);
                $user->setPassword($_POST['editpassword']);
                $user->setRoleId((int)$_POST['editrole']);
                $user->setPhoto($photo);

                if ($this->userModel->updateUser($user)) {
                    header("Location: users.php");
                    exit();
                }

                throw new Exception("Failed to update user");
            } catch (Exception $e) {
                error_log("Error in updateUser: " . $e->getMessage());
            }
        }
    }

    public function findUserById(int $id)
    {
        return $this->userModel->findUserById($id);
    }
}
