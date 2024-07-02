<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'VetLife';
const SITE_OWNER = 'Waimea College';


//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/',      'pages/home.php');

$router->route(GET, PAGE, '/about', 'pages/about.php');

$router->route(GET, PAGE, '/employees', 'pages/employees.php');

$router->route(GET, PAGE, '/process-signup', 'pages/process-signup.php');




//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
