<!-- Header typically has the site name which links to home page -->

<header id="main-header">
    
    <a href="/"><?= SITE_NAME ?></a>



    <section id="displayName">
        <?php


            $loggedIn = $_SESSION['user']['loggedIn'] ?? false;
            $isAdmin = $_SESSION['user']['manager'] ?? false;

            if ($loggedIn) {
            $name = $_SESSION['user']['forename'] . ' ' . $_SESSION['user']['surname'];
            echo '<p>Welcome, <strong>' . $name . '</strong>';

            if ($isAdmin){
            echo ' (Admin)';
            }

            echo '</p>';
            }        


            
         require '_nav.php'; ?>



        </section>






</header>

