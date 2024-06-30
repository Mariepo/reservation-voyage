<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Destinations</title>
</head>
<body>
    
    <?php
    displayCreateSuccessBanner();
    displayUpdateSuccessBanner();
    displayDeleteSuccessBanner();
    ?>

    <main>
        <button style="background-color: lightblue;">Destinations</button>
        <button>Réservations</button>
        <button>Clients</button>
        <button>Paiements</button>

        <h1>Destinations</h1>
        <div>
            <button onclick="redirectToCreateDestination()">Ajouter une destination</button>
        </div>
        <table>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
            <tr>
                <?php
                    foreach($destinations as $destination){
                        echo "<tr>";
                            echo "<td>" . htmlspecialchars($destination["nom"]) . "</td>";
                            echo "<td>" . htmlspecialchars($destination["description"]) . "</td>";
                            echo "<td>" . htmlspecialchars($destination["prix"]) . "</td>";
                            echo "<td>";
                            if (isset($destinationCategories[$destination['id_destination']])) {
                                foreach ($destinationCategories[$destination['id_destination']] as $categorie) {
                                    echo displayCategorieName($categorie["nom"], $categorie["id_categorie"]) . "<br>";
                                }
                            }
                            echo "</td>";
                            echo "<td>";
                            echo "<button onclick='redirectToEditDestination(" . htmlspecialchars($destination['id_destination']) .")'>Modifier</button>";
                            echo "<button onclick='displayModalDeleteDestination(\"" . htmlspecialchars($destination['id_destination']) . "\", \"" . htmlspecialchars($destination['nom']) . "\");'>Supprimer</button>";
                            echo "</td>";
                        echo "</tr>";
                    };


                ?>
            </tr>
        </table>

        <!-- Modal de suppresion -->
        <div id="js-delete-modal"  class="modal">
            <div class="modal-content">
                <button class="close-btn" onclick="closeElement('.modal')">X</button>
                <h2>Êtes-vous sûrs de vouloir supprimer la destination suivante : <span id="destination-id-modal"></span> ?</h2>
                <form method="post" action="../../controllers/admin/destinations-controller.php?action=confirmDelete">
                    <input type="hidden" id="modal-destination-id" name="id_destination" value="">
                    <button type="submit">Je supprime</button>
                    <button type="button" onclick="closeElement('.modal')">Annuler</button>
                </form>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        function redirectToCreateDestination(){
            window.location.replace("../../controllers/admin/destinations-controller.php?action=create");
        }
        function redirectToEditDestination(id_destination){
            window.location.replace(`../../controllers/admin/destinations-controller.php?action=edit&id_destination=${id_destination}`);
        }
        function redirectToDeleteDestination(id_destination){
            window.location.replace(`../../controllers/admin/destinations-controller.php?action=delete&id_destination=${id_destination}`);
        }
        function closeElement(element){
            const componentToClose = document.querySelector(element);
            const closeButton = document.querySelector(".close-btn");
            componentToClose.style.display = "none";
            window.location.replace("../../controllers/admin/destinations-controller.php");
        }
        function displayModalDeleteDestination(id_destination, nom_destination){
            const modalDeleteDestination = document.querySelector("#js-delete-modal");
            const modalDestinationId = document.querySelector("#modal-destination-id");
            const modalText = document.querySelector("#destination-id-modal");
            modalDestinationId.value = id_destination;
            modalText.textContent = nom_destination;
            modalDeleteDestination.style.display = "block";
        }
    </script>
</body>
</html>

<?php
    function displayCategorieName($categorie_name, $id_categorie){
        if($id_categorie == 7){
            return "";
        } else {
            return htmlspecialchars($categorie_name);
        }
    }
?>


