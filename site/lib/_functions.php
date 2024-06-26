<?php

define('INFO', false);
define('ERROR', true);


/*-------------------------------------------------------------
 * Connect to MySQL database via PDO
 *
 * Requires: A config file called _db.ini with these fields...
 *             name="_______"  (the database to connect to)
 *             user="_______"  (the MySQL username)
 *             pass="_______"  (the MySQL password)
 *
 * Returns: the PDO database connection object
 *-------------------------------------------------------------*/
function connectToDB() {
    $db = parse_ini_file( '_db.ini', true );

    $dsn = 'mysql:host=localhost;charset=utf8mb4;dbname=' . $db['name'];

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        return new PDO($dsn, $db['user'], $db['pass'], $options);
    }
    catch (PDOException $e) {
        consoleLog($e->getMessage(), 'DB Connect', ERROR);
        die('There was an error when connecting to the database');
    }
}


/*-------------------------------------------------------------
 * Add debug info to the JS Console in the browser
 *
 * Note, if a constant DEBUG is defined and set to false, this
 *       will suppress the output, otherwise it is shown
 *
 * Arguments: $var - a variable to display
 *            $heading - an optional heading to show beforhand
 *            $level - either INFO (default) or ERROR level
 *-------------------------------------------------------------*/
function consoleLog($var, $heading='', $level=INFO) {
    if (defined('DEBUG') ? DEBUG : true) {
        $logCmd   = $level == ERROR ? 'console.error' : 'console.log';
        $logLabel = $level == ERROR ? 'ERROR' : 'INFO';

        echo '<script>';
        echo   $logCmd . '(`PHP ' . $logLabel . ': ' . $heading . '`);';
        echo   $logCmd . '(`';
        print_r($var);
        echo   '`);';
        echo '</script>';
    }
}




