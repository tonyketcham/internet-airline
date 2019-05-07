<?php

$host = "localhost";
$username = "root";
$user_pass = "usbw";
$my_db = "internet airline";

        $link = mysqli_connect($host, $username, $user_pass, $my_db);

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "\nEnsure you have launched the localhost in USBWebserver." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
?>