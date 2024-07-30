<?php 


$db = connectToDB();

$query = 'SELECT * FROM users';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();


echo "<h1>employees</h1>";
echo "<ul>";
foreach ($users as $user) {

    echo "<li>{$user['username']}   -   {$user['forename']}";
    if ($isAdmin){
        echo "<a href='delete-user?id={$user['id']}'>X</a>";
        echo "</li>";
   
    }

    echo "{$user['description']}";
}
echo "</ul>";


if ($isAdmin){
    
 echo   '<a href="/new-employees">New Employee</a>';

}

?>





