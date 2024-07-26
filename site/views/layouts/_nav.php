<!-- Main navigation menu. Can add logic for user type / access -->

<nav id="main-nav">
 
    <menu hx-boost="true">
        <button id="menu-open">☰</button>

        <ul id="menu-links">
            <li><a href="/">Home</a>
            <li><a href="/about">About</a>
            <li><a href="/employees">employees</a>
            <li><a href="/booking">book</a>
            <li>
                <?php

                    $loggedIn = $_SESSION['user']['loggedIn'] ?? false;
                    $isAdmin = $_SESSION['user']['manager'] ?? false;

                    if ($loggedIn) {
                    echo '<p><a href="/logout">Logout</a></p>';
                    }
                    else {

                    echo '<p><a href="/login">login</a></p>';

                    }



                ?>
            </li>
        </ul>
    </menu>

</nav>







<!-- Update the nav links -->
<script>configureNav();</script>

