<?php
    $host ="localhost";
    $dbname ="falesia";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($host,$username, $password, $dbname);

    if(!$mysqli){
        die("Connessione al database fallita: " . $conn->connect_error);
    }
    return $mysqli;
?>