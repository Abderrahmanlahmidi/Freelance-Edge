<?php

require_once basePath("App/Models/Utilisateur.php");
session_start();

class UtilisateurController
{

    private Utilisateur $userModel;

    public function __construct()
    {
        $this->userModel = new Utilisateur();
    }

    public function homeController()
    {
        require_once basePath("App/Views/Pages/homeView.php");
    }

    public function registerUserController()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $firstname = $_POST['first_name'];
            $lastname = $_POST['last_name'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->userModel->register($firstname, $lastname, $age, $email, $password);
            header('Location:/login');
            exit;

        }
        require_once basePath("App/Views/authView/registerView.php");
    }

    public function connectionUserController()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->connecter($email);

            if ($user !== null) {
                $emailUser = $user->email;
                $passwordUser = $user->password;

                if ($email == $emailUser && password_verify($password, $passwordUser)) {

                    $_SESSION["email"] = $emailUser;
                    $_SESSION["password"] = $passwordUser;
                    $_SESSION["firstName"] = $user->first_name;
                    $_SESSION["lastName"] = $user->last_name;
                    header('Location:/');
                    exit;
                }
            }

        }
        require_once basePath("App/Views/authView/connectionView.php");
    }

    public function logoutUserController()
    {
        session_destroy();
        header('Location:/');
        exit;
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


    public function getAllUsers()
    {
        $this->userModel->getAllUsers();
        require_once basePath("App/Views/admin/dashboard/users.php");

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
