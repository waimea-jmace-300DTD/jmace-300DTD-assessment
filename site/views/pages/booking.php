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
    <label>name</label>
    <input type="text" name="name" required>
    
    <label>address</label>
    <input type="text" name="address" required>

    <label>description</label>
    <input type="text" name="description">

    <label>time and date</label>
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

    <input type="submit" value="submit">
    
</form>