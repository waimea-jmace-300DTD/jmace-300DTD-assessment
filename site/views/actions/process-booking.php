
<?php

consoleLog($_POST, 'Form Data');

// Get the form data
$name = $_POST['name'];
$add = $_POST['address'];
$desc = $_POST['description'];
$date = $_POST['datetime'];
$vet = $_POST['vet'];

// Hash the password


$db = connectToDB();
// Add the user data
$query = 'INSERT INTO bookings (name, address, description, date, pref_vet) VALUES (?, ?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$name, $add, $desc, $date, $vet]);

echo '<h2> your booked!   </h2>';
echo '<a href="/">Home</a>';
