
<?php

consoleLog($_POST, 'Form Data');

// Get the form data
$vet_id = $_POST['vet'];
$job_id = $_POST['jobID'];


$db = connectToDB();
// Add the user data
$query = 'UPDATE bookings SET vet_id=? WHERE id=?';
$stmt = $db->prepare($query);
$stmt->execute([$vet_id, $job_id]);

echo '<h2> You are booked!   </h2>';
echo '<a href="/">Home </a>';
echo'<a href="/jobs">another?</a>';
