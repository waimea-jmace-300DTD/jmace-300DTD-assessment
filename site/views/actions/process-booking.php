
<?php

consoleLog($_POST, 'Form Data');

// Get the form data
$name = $_POST['name'];
$add = $_POST['address'];
$desc = $_POST['description'];
$date = $_POST['datetime'];
$vet = $_POST['vet'];

// Hash the password
$hash = password_hash($add, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed Password');

$db = connectToDB();
// Add the user data
$query = 'INSERT INTO booking (name, address, description, date, prevet) VALUES (?, ?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$name, $hash, $desc, $date, $vet]);

echo '<h2> your booked!   </h2>';
echo '<a href="/">Home</a>';
