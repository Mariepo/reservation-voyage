<?php 
    // Connexion à la BDD
require_once "bdd.php";

//     // récupérer les destinations
function fetchDestinations(){
    global $pdo; // Ajoutez cette ligne pour rendre la variable $pdo accessible dans la fonction
    $query = "SELECT nom, description, prix FROM destination;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
};

function insertDestination($nom, $description, $prix, $disponibilite){
    global $pdo; // Ajoutez cette ligne pour rendre la variable $pdo accessible dans la fonction
    $query = "INSERT INTO destination (nom, description, prix, disponibilite) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nom, $description, $prix, $disponibilite]);
};
