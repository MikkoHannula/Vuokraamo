<?php

try{

    $pdo = new PDO("mysql:host=localhost;dbname=vuokraamo", "root",);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch( PDOException $e){
 die("ERROR: Could not connect to database" . $e->getMessage());
}