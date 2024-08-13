<?php 


$db = connectToDB();

$query = 'SELECT * FROM users';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();


echo "<h1>employees</h1>";
echo "<ul>";
foreach ($users as $user) {

    echo '<a href="/jobs" hx-post = "jobs" id="clicked-vet" >' .  "<li>{$user['username']}   -   {$user['forename']} : " .'</a>';
    if ($isAdmin){
        echo '<a href="/delete-user">X</a>';
        echo "</li>";
   
    }

    echo "  {$user['description']}";
}
echo "</ul>";


if ($isAdmin){
    
 echo   '<a href="/new-employees">New Employee</a>';

}

?>





