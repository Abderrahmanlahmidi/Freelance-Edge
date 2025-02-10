<?php

// GET METHODS
$router -> get('/', 'userController', 'homeController');
$router->get('/register', 'userController', 'registerUserController');
$router -> get('/login', 'userController', 'connectionUserController');
$router -> get('/logout', 'userController', 'logoutUserController');

// POST METHODS
$router->post('/register', 'userController', 'registerUserController');
$router -> post('/login', 'userController', 'connectionUserController');

$router -> post('/admindash', 'userController', '');



