<!-- Header typically has the site name which links to home page -->

<header id="main-header">
    
    <a href="/"><?= SITE_NAME ?></a>

    <?php require '_nav.php'; ?>


<?php

    $loggedIn = $_SESSION['user']['loggedIn'] ?? false;
$isAdmin = $_SESSION['user']['manager'] ?? false;
echo '<br>';
if ($loggedIn) {
    $name = $_SESSION['user']['forename'] . ' ' . $_SESSION['user']['surname'];
    echo 'Welcome, ' . $name . '</h1>';

    if ($isAdmin){
        echo '<p>You are an Admin!</p>';
    }

    echo '<p><a href="/logout">Logout</a></p>';
}
else {

    echo '<p><a href="/login">login</a></p>';

}


?>

</header>

