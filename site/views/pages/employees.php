<?php 


$db = connectToDB();

$query = 'SELECT * FROM users';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();


echo "<h1>employees</h1>";
echo "<ul>";
foreach ($users as $user) {

    echo  "<li>{$user['username']}   -   {$user['forename']}";
    if ($isAdmin){
        ?>
        <button
            hx-delete="/user/<?= $user['id'] ?>"
            hx-confirm="Really delete this user?"
            class="danger"
        >X</button>
    
        <?php
        echo "</li>";
   
    }

    echo "  {$user['description']}";
}
echo "</ul>";


if ($isAdmin){
    
 echo   '<a href="/new-employees">New Employee</a>';

}

?>





