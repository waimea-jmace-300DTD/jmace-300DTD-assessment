
<?php

consoleLog($_POST, 'Form Data');

// Get the form data
$fore = $_POST['forename'];
$sur = $_POST['surname'];
$user = $_POST['username'];
$pass = $_POST['pass'];
$desc = $_POST['description'];

// Hash the password
$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed Password');

$db = connectToDB();
// Add the user data
$query = 'INSERT INTO users (forename, surname, username, hash, description) VALUES (?, ?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$fore, $sur, $user, $hash, $desc]);

echo '<h2> Account created! </h2>';
