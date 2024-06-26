<?php 
// Le controller récupère les infos de la BDD grâce au model
require_once "../../models/admin/destinations-model.php";


// Si l'utilisateur ne clique sur aucun boutob, on importe et affiche la page de la liste des destinations
if(!isset($_GET["action"])){
    // Fetcher les destinations de la BDD (bdd = model) et les stocker dans le tableau destination pour l'afficher via un foreach plus tard
    $destinations = fetchDestinations();
    include "../../views/admin/destinations/index.php";
} 

else if($_GET["action"] == "create"){
    include "../../views/admin/destinations/create.php";
} 

else if($_GET["action"] == "insert"){
    if(isset($_POST["nom"], $_POST["description"], $_POST["prix"], $_POST["disponibilite"])){
        $nom = htmlspecialchars($_POST["nom"]);
        $description = htmlspecialchars($_POST["description"]);
        $prix = htmlspecialchars($_POST["prix"]);
        // convertir disponibilite en boolean
        if(htmlspecialchars($_POST["disponibilite"] == "true")){
            $disponibilite = 1; 
        } else {
            $disponibilite =  0;
        };
        insertDestination($nom, $description, $prix, $disponibilite);
        header("Location: destinations-controller.php?create=success");
    }
} 

else if($_GET["action"] == "edit"){
    $id_destination = htmlspecialchars($_GET["id_destination"]);
    $destination = fetchDestinationById($id_destination);
    include "../../views/admin/destinations/edit.php";
} 

else if($_GET["action"] == "update"){
    $id_destination = htmlspecialchars($_POST["id_destination"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $description = htmlspecialchars($_POST["description"]);
    $prix = htmlspecialchars($_POST["prix"]);
    if(htmlspecialchars($_POST["disponibilite"]) == true){
        $disponibilite = 1;
    } else {
        $disponibilite = 0;
    };
    updateDestination($id_destination, $nom, $description, $prix, $disponibilite);
    header("Location: destinations-controller.php?update=success");
};

