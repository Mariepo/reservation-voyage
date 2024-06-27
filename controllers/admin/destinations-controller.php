<?php 
// Le controller récupère les infos de la BDD grâce au model
require_once "../../models/admin/destinations-model.php";


// Si l'utilisateur ne clique sur aucun boutob, on importe et affiche la page de la liste des destinations
if(!isset($_GET["action"])){
    // Fetcher les destinations de la BDD (bdd = model) et les stocker dans le tableau destination pour l'afficher via un foreach plus tard
    $destinations = fetchDestinations();
    $destinationCategories = [];
    foreach ($destinations as $destination) {
        $destinationCategories[$destination['id_destination']] = fetchCategoriesForDestination($destination['id_destination']);
    }
    include "../../views/admin/destinations/index.php";
} 
// CREER des destinations
else if($_GET["action"] == "create"){
    $categories = fetchCategories();
    include "../../views/admin/destinations/create.php";
} else if($_GET["action"] == "insert"){
    if(isset($_POST["nom"], $_POST["description"], $_POST["prix"])){
        $nom = htmlspecialchars($_POST["nom"]);
        $description = htmlspecialchars($_POST["description"]);
        $prix = floatval($_POST["prix"]);
        
        // Vérifiez si une catégorie a été sélectionnée
        if(isset($_POST["id_categorie"]) && $_POST["id_categorie"] !== ""){
            $id_categorie = htmlspecialchars($_POST["id_categorie"]);
        } else {
            $id_categorie = null; 
        }
        
        // convertir disponibilite en boolean
        $disponibilite = isset($_POST["disponibilite"]) ? ($_POST["disponibilite"] == "true" ? 1 : 0) : null;
        
        insertDestination($nom, $description, $prix, $disponibilite);
        $id_destination = $pdo->lastInsertId();
        
        // Insérer dans la table appartenir uniquement si une catégorie est sélectionnée
        if ($id_categorie !== null) {
            insertIntoAppartenir($id_destination, $id_categorie);
        }

    }
    header("Location: destinations-controller.php?create=success");
} else if($_GET["action"] == "edit"){
    $categories = fetchCategories();
    $id_destination = htmlspecialchars($_GET["id_destination"]);
    $destination = fetchDestinationById($id_destination); 
    include "../../views/admin/destinations/edit.php";
}    
 // MAJ destination
else if ($_GET["action"] == "update") {
    $id_destination = htmlspecialchars($_POST["id_destination"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $description = htmlspecialchars($_POST["description"]);
    $prix = htmlspecialchars($_POST["prix"]);
    // Convertir disponibilite en booléen
    $disponibilite = ($_POST["disponibilite"] === "true") ? 1 : 0;
    $id_categorie = ($_POST["id_categorie"]);

    updateDestination($id_destination, $nom, $description, $prix, $disponibilite);
    updateAppartenir($id_destination, $id_categorie);
    header("Location: destinations-controller.php?update=success");
}
// SUPPR destination
else if($_GET["action"] == "confirmDelete"){
    $id_destination = htmlspecialchars($_POST["id_destination"]);
    deleteDestination($id_destination);
    header("Location: destinations-controller.php?delete=success");
};




// Success handler
// Si ajout de destination
function displayCreateSuccessBanner(){
    if (isset($_GET["create"]) && $_GET["create"] == "success") {
        echo '<div style="background-color: green; padding: 12px" class="banner">';
            echo '<span style="color:white;">Destination ajoutée avec succès !</span>';
            echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
        echo '</div>';
    }
}; 
// Si modification de destination
function displayUpdateSuccessBanner(){
    if(isset($_GET["update"]) && $_GET["update"] == "success"){
        echo '<div style="background-color: green; padding: 12px" class="banner">';
            echo '<span style="color:white;">Destination modifiée avec succès !</span>';
            echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
        echo '</div>'; 
    }
};
// Si suppression de destination
function displayDeleteSuccessBanner(){
    if(isset($_GET["delete"]) && $_GET["delete"] == "success"){
        echo '<div style="background-color: green; padding: 12px" class="banner">';
            echo '<span style="color:white;">Destination supprimée avec succès !</span>';
            echo '<button class="close-btn" onclick=\'closeElement(".banner")\'>X</button>';
        echo '</div>'; 
    }
};
