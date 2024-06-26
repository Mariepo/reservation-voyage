<?php
displayCreateSuccessBanner();
displayUpdateSuccessBanner();
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
                        echo "<button onclick='redirectToEditDestination(" . htmlspecialchars($destination['id_destination']) .")'>Modifier</button>";
                        echo "<button onclick='displayDeleteDestinationModal()'>Supprimer</button>";
                        // echo "<button onclick='redirectToDeleteDestination(" . htmlspecialchars($destination["id_destination"]) .")'>Supprimer</button>";
                        echo "</td>";
                    echo "</tr>";
                };
            ?>
        </tr>
    </table>
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
        console.log("hello");
        const componentToClose = document.querySelector(element);
        const closeButton = document.querySelector(".close-btn");
        componentToClose.style.display = "none";
    }

</script>
