<?php

    $mysqli = new mysqli("peronnetwork.zapto.org","root", "root","ucas",3306);

    if(!$mysqli){
        die("Connessione al database fallita: " . $conn->connect_error);
    }
    return $mysqli;
?>