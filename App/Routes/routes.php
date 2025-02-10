<?php

// GET METHODS
$router -> get('/', 'UtilisateurController', 'homeController');
$router->get('/register', 'UtilisateurController', 'registerUserController');
$router -> get('/login', 'UtilisateurController', 'connectionUserController');
$router -> get('/logout', 'UtilisateurController', 'logoutUserController');
$router -> get('/users', 'UtilisateurController', 'getAllUsers');

// POST METHODS
$router->post('/register', 'UtilisateurController', 'registerUserController');
$router -> post('/login', 'UtilisateurController', 'connectionUserController');




