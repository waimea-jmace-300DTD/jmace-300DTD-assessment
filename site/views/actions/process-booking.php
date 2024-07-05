
<?php

consoleLog($_POST, 'Form Data');

// Get the form data
$name = $_POST['name'];
$add = $_POST['address'];
$date = $_POST['datetime'];
$desc = $_POST['description'];

// Hash the password
$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed Password');

$db = connectToDB();
// Add the user data
$query = 'INSERT INTO users (name, address , date, description) VALUES (?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$name, $add, $date, $desc]);

echo '<h2> your booked! </h2>';
