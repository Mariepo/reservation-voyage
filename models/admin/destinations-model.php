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

function fetchCategoriesForDestination($id_destination){
    global $pdo;
    $query = "
        SELECT categorie.nom, categorie.id_categorie
        FROM categorie
        JOIN appartenir ON categorie.id_categorie = appartenir.id_categorie
        WHERE appartenir.id_destination = ?;
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_destination]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchCategories(){
    global $pdo;
    $query = "SELECT id_categorie, nom FROM categorie;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

// Afficher destinations
function insertDestination($nom, $description, $prix, $disponibilite){
    global $pdo; // Ajoutez cette ligne pour rendre la variable $pdo accessible dans la fonction
    $query = "INSERT INTO destination (nom, description, prix, disponibilite) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nom, $description, $prix, $disponibilite]);
};

function insertIntoAppartenir($id_destination, $id_categorie){
    global $pdo;
    $query = "INSERT INTO appartenir (id_destination, id_categorie) VALUES (?, ?)";
    if ($id_categorie === '' || $id_categorie === null) {
        $id_categorie = null;
    }
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_destination, $id_categorie]);
}

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

function updateAppartenir($id_destination, $id_categorie){
    global $pdo;
    $query = "UPDATE appartenir SET id_categorie = ? WHERE id_destination = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_categorie, $id_destination]);
}

function deleteDestination($id_destination){
    global $pdo;
    $query = "DELETE FROM destination WHERE id_destination = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_destination]);
};



