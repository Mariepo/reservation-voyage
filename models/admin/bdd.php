<?php
$servername = "localhost";
$dbname = "reservation_voyages";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;user=$dbusername;password$dbpassword");
} catch (PDOException $e){
    echo "La connexion a échouée" . $e->getMessage();
}


