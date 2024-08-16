<?php 

//showing jobs 



$loggedIn = $_SESSION['user']['loggedIn'] ?? false;
$isAdmin = $_SESSION['user']['manager'] ?? false;
$vetID = $_SESSION['user']['id'];


//displaying all the jobs being done for the manager
if($isAdmin){


    $db = connectToDB();

    $query = 'SELECT * FROM bookings
              WHERE done IS NULL ';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $bookings = $stmt->fetchAll();
    
//displaying all the jobs being done    
    
    echo "<h1>Everyone's Jobs</h1>";
    echo "<dl>";
    foreach ($bookings as $booking) {
        if($booking['vet_id'] != NULL){    
            echo "<dt>Request #{$booking['id']} </dt>";
            echo "<dd>";
            echo "{$booking['address']}   -   {$booking['name']}";
            echo "  -  {$booking['date']}";
            echo "  -  {$booking['description']}";
            echo "  -  given vet id: {$booking['vet_id']}";
            echo "</dd>";
            echo" ";
            echo" ";
        }
    }

//displaying all the unsigned Jobs

    echo "<h1>unsigned Jobs</h1>";

    foreach ($bookings as $booking) {
        if($booking['vet_id'] == NULL){    
            echo "<dt>Request #{$booking['id']} </dt>";
            echo "<dd>";
            echo "{$booking['address']}   -   {$booking['name']}";
            echo "  -  {$booking['date']}";
            echo "  -  {$booking['description']}";
            echo "  -  given vet id: {$booking['vet_id']}";
            echo "</dd>";
            echo" ";
            echo" ";
        }
    }
        echo "</dl>";
    


    echo '<p><a href="/give-jobs">Give Jobs</a></p>';

}

//displaying all the jobs for each vet yet too be done

else{

    $db = connectToDB();

    $query = 'SELECT * FROM bookings 
    WHERE done IS NULL 
    AND vet_id =' . "$vetID";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $bookings = $stmt->fetchAll();



        echo "<h1>Your Jobs</h1>";
        echo "<dl>";
    foreach ($bookings as $booking) {

        echo "<dt>Request #{$booking['id']} </dt>";
        echo "<dd>";
        echo "<strong>{$booking['address']}</strong>   -   {$booking['name']}";
        echo "  -  <strong>{$booking['date']}</strong>";
        echo "  -  {$booking['description']}";
        echo "</dd>";
        echo" ";
        echo" ";


//the done button       
        ?>
        <button
        hx-put="/done/<?= $booking['id']  ?>"
        hx-confirm="Are you done?"
        class="danger"
        >Done</button>
    
        <?php

    }
    echo "</dl>";


}
