<?php

require_once basePath("App/Models/Utilisateur.php");
session_start();


class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new Utilisateur();
    }

    public function homeController()
    {
        require_once basePath("App/Views/homeView.php");
    }

    public function registerUserController()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->userModel->register($first_name, $last_name, $age, $email, $password);
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
        header('Location:/login');
        exit;
    }

}






