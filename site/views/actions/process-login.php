
<?php


// consoleLog($_POST, 'Form Data');

// Get the form data
$user = $_POST['user'];
$pass = $_POST['pass'];

$db = connectToDB();
// Try to find the user with the given username
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

// consoleLog($userData, 'DB Data');

if ($userData) {
    if (password_verify($pass, $userData['hash'])) {
        // We got here, so user and passwords both ok
        $_SESSION['user']['loggedIn'] = true;
        // Store the user's data in the session
        $_SESSION['user']['manager'] = $userData['manager'];
        $_SESSION['user']['forename'] = $userData['forename'];
        $_SESSION['user']['surname'] = $userData['surname'];
        $_SESSION['user']['id'] = $userData['id'];

        // Redirect to the home page
        
        header('hx-redirect: ' . SITE_BASE);

    }
    else {
        echo 'Invalid password or username  ';
        echo '<a href="/">Home</a>';

    }
}
else {
    echo 'Invalid password or username';
    echo '<a href="/">Home</a>';

}



