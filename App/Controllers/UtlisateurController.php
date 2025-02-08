<?php



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
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role_id = $_POST['role'];
        }

        $photo = 'default.jpg';
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '';
            $photoName = uniqid() . '_' . basename($_FILES['photo']['name']);
            $photoPath = $uploadDir . $photoName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
                $photo = $photoName;
            }
        }

        try {

        $user = new Utilisateur ();
        $user->setfullName($fullName);
        $user->setPhoto($photo);
        $user->setEmail($email);
        $user->setPassword($password);
        

        $role = new Role ();
        $user->setRole($role);
        $user->setRoleId($role_id);

        $user->createUser($user);

        header('Location: ');
        exit; 

        }catch (Exception $e )
        {
            $eroro = $e->getMessage();
        }

       

    }
}
