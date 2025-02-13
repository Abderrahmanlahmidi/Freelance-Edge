<?php

// GET METHODS
$router -> get('/', 'UtilisateurController', 'homeController');
$router->get('/register', 'UtilisateurController', 'registerUserController');
$router -> get('/login', 'UtilisateurController', 'connectionUserController');
$router -> get('/logout', 'UtilisateurController', 'logoutUserController');
$router -> get('/logout', 'UtilisateurController', 'logoutUserController');
$router -> get('/dashboard', 'UtilisateurController', 'getAllUsers');
$router -> get('/offer', 'offreController', 'getOffresController');


// POST METHODS
$router->post('/register', 'UtilisateurController', 'registerUserController');
$router -> post('/login', 'UtilisateurController', 'connectionUserController');
$router -> post('/dashboard', 'UtilisateurController', 'addUser');




