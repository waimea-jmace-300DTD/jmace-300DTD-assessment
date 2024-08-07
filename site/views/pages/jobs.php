<?php 

//showing jobs 



$loggedIn = $_SESSION['user']['loggedIn'] ?? false;
$isAdmin = $_SESSION['user']['manager'] ?? false;
$vetID = $_SESSION['user']['id'];


//displaying all the jobs being done for the manager
if($isAdmin){


    $db = connectToDB();

    $query = 'SELECT * FROM bookings';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $bookings = $stmt->fetchAll();
    
    
    
    echo "<h1>Everyone's Jobs</h1>";
    echo "<dl>";
    foreach ($bookings as $booking) {
    
        echo "<dt>Request #{$booking['id']} </dt>";
        echo "<dd>";
        echo "{$booking['address']}   -   {$booking['name']}";
        echo "  -  {$booking['description']}";
        echo "</dd>";
    }
    echo "</dl>";
    


    echo '<p><a href="/give-jobs">Give Jobs</a></p>';

}

//displaying all the jobs for each vet yet too be done

else{

    $db = connectToDB();

    $query = 'SELECT * FROM bookings WHERE vet_id= vetID';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $bookings = $stmt->fetchAll();



        echo "<h1>Your Jobs</h1>";
        echo "<dl>";
    foreach ($bookings as $booking) {

        echo "<dt>Request #{$booking['id']} </dt>";
        echo "<dd>";
        echo "{$booking['address']}   -   {$booking['name']}";
        echo "  -  {$booking['description']}";
        echo "</dd>";
    }
    echo "</dl>";


}
