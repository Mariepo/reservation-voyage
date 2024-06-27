<?php 
    // Connexion à la BDD
require_once "bdd.php";

//     // récupérer les destinations
function fetchDestinations(){
    global $pdo; // Ajoutez cette ligne pour rendre la variable $pdo accessible dans la fonction
    $query = "SELECT id_destination, nom, description, prix, disponibilite FROM destination;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
};

// Afficher destinations
function insertDestination($nom, $description, $prix, $disponibilite){
    global $pdo; // Ajoutez cette ligne pour rendre la variable $pdo accessible dans la fonction
    $query = "INSERT INTO destination (nom, description, prix, disponibilite) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nom, $description, $prix, $disponibilite]);
};

function fetchDestinationById($id_destination){
    global $pdo; // Ajoutez cette ligne pour rendre la variable $pdo accessible dans la fonction
    $query = "SELECT id_destination, nom, description, prix, disponibilite FROM destination WHERE id_destination = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_destination]);
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}

function updateDestination($id_destination, $nom, $description, $prix, $disponibilite){
    global $pdo;
    $query = "UPDATE destination SET nom = ?, description = ?, prix = ?, disponibilite = ? WHERE id_destination = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nom, $description, $prix, $disponibilite, $id_destination]);
};

function deleteDestination($id_destination){
    global $pdo;
    $query = "DELETE FROM destination WHERE id_destination = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_destination]);
};