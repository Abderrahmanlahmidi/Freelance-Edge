<?php

// GET METHODS
$router -> get('/', 'UtilisateurController', 'homeController');
$router->get('/register', 'UtilisateurController', 'registerUserController');
$router -> get('/login', 'UtilisateurController', 'connectionUserController');
$router -> get('/logout', 'UtilisateurController', 'logoutUserController');
$router -> get('/logout', 'UtilisateurController', 'logoutUserController');
$router -> get('/dashboard', 'UtilisateurController', 'getAllUsers');
<<<<<<< HEAD
=======
$router -> get('/offer', 'offreController', 'getOffresController');
>>>>>>> 4bd9f714b8f2c7d71175d77a7a44ae70717c3e66


// POST METHODS
$router->post('/register', 'UtilisateurController', 'registerUserController');
$router -> post('/login', 'UtilisateurController', 'connectionUserController');
$router -> post('/dashboard', 'UtilisateurController', 'addUser');






