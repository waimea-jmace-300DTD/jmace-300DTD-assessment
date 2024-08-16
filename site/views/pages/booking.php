<?php

$db = connectToDB();

$query = 'SELECT * FROM users 
            WHERE specialities IS NOT NULL
            ORDER BY surname ASC';
$stmt = $db->prepare($query);
$stmt->execute();
$vets = $stmt->fetchAll();

?>

<form hx-post="process-booking" id="form">
    <label>Name</label>
    <input type="text" name="name" required>
    
    <label>Address</label>
    <input type="text" name="address" required>

    <label>Description</label>
    <input type="text" name="description">

    <label>Time and Date</label>
    <input type="datetime-local" name="datetime" required>
    
    <label>Vet</label>
    <select name="vet" >
        <option value="Any">Any</option>
<?php

    foreach ($vets as $vet) {

        echo '<option value="' . $vet['forename'] . ' ' . $vet['surname'] . '">';
        echo   "{$vet['forename']} {$vet['surname']}";
        echo   " ({$vet['specialities']})";
        echo '</option>';
    }

?>
    </select>

    <input type="submit" value="Submit">
    
</form>