<?php 

// require_once './lib/_session.php';
// require_once './lib/_functions.php';

// $db = connectToDB();

// $query = 'SELECT * FROM logins';
// $stmt = $db->prepare($query);
// $stmt->execute();
// $users = $stmt->fetchAll();


// echo "<h1>Users</h1>";
// echo "<ul>";
// foreach ($users as $user) {

//     echo "<li>{$user['username']}    {$user['forename']}";

//     echo "<a href='delete-user.php?id={$user['id']}'>X</a>";
//     echo "</li>";
// }
// echo "</ul>";

?>


<form method="POST" action="process-signup.php" id="form">
    <label>Forename</label>
    <input type="text" name="forename" required>

    <label>Surname</label>
    <input type="text" name="surname" required>
    
    <label>Username</label>
    <input type="text" name="username" required>

    <label>description</label>
    <input type="text" name="description">

    <label>Password</label>
    <input type="password" name="pass" required>

    <input type="submit" value="Sign Up">
    
</form>








