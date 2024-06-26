<?php

require_once './lib/_session.php';
require_once './lib/_functions.php';

$db = connectToDB();

$query = 'SELECT * FROM logins';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();


echo "<h1>Users</h1>";
echo "<ul>";
foreach ($users as $user) {

    echo "<li>{$user['username']}    {$user['forename']}";

    echo "<a href='delete-user.php?id={$user['id']}'>X</a>";
    echo "</li>";
}
echo "</ul>";



