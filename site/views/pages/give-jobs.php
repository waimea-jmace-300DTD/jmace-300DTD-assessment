<?php 


$db = connectToDB();


$query = 'SELECT * FROM bookings
          WHERE done IS NULL';
$stmt = $db->prepare($query);
$stmt->execute();
$bookings = $stmt->fetchAll();


echo "<h1>New Booking</h1>";
echo "<dl>";
foreach ($bookings as $booking) {

    echo "<dt>Request #{$booking['id']} </dt>";
    echo "<dd>";
    echo "{$booking['address']}   -   {$booking['name']}";
    echo "  -  {$booking['description']}";
    echo "  -  wanted vet : {$booking['pref_vet']}";
    echo "  -  given vet id: {$booking['vet_id']}";
    echo "</dd>";
}
echo "</dl>";



// selection form 

$query = 'SELECT * FROM users 
            WHERE specialities IS NOT NULL
            ORDER BY surname ASC';
$stmt = $db->prepare($query);
$stmt->execute();
$vets = $stmt->fetchAll();

?>
<form hx-post="finish-booking" id="form">
    <label>Request #</label>

    <select name="jobID" required>

<?php

    foreach ($bookings as $booking) {

        echo '<option>';
        echo   "{$booking['id']}";
        echo '</option>';
    }

?>
    </select>

    <label>Vet</label>
    <select name="vet" required>

<?php

    foreach ($vets as $vet) {

        echo '<option value="  ' . $vet['id'] . '">';
        echo   "{$vet['username']} : {$vet['id']}";
        echo '</option>';
    }

?>
    </select>

    <input type="submit" value="Allocate Vet to Job">
    
</form>
   





