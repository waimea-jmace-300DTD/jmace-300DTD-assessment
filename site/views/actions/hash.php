<?php

require_once './lib/_functions.php';

$password = $_GET['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

consoleLog($password, 'Password');
consoleLog($hash, 'Hash');