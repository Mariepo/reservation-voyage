
<?php
    // Si ajout de destination
    if (isset($_GET["create"]) && $_GET["create"] == "success") {
        echo '<div style="background-color: green; padding: 12px" class="banner">';
            echo '<span style="color:white;">Destination ajoutée avec succès !</span>';
            echo '<button class="close-btn">X</button>';
        echo '</div>';
    }; 

    // Si modification de destination
    if(isset($_GET["update"]) && $_GET["update"] == "success"){
        echo '<div style="background-color: green; padding: 12px" class="banner">';
            echo '<span style="color:white;">Destination modifiée avec succès !</span>';
            echo '<button class="close-btn">X</button>';
        echo '</div>'; 
    };
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
                        echo "<button>Supprimer</button>";
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
    function closeBanner(){
        const banner = document.querySelector(".banner");
        const closeBtn = document.querySelector(".close-btn");
        if(banner) {
            closeBtn.addEventListener("click", function(){
                banner.style.display = "none";
            })
        }
    }
    closeBanner();
</script>
