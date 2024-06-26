
<button style="background-color: lightblue;">Destinations</button>
<button>Reservations</button>
<button>Clients</button>
<button>Paiement</button>

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
                    echo "<td>";
                    echo htmlspecialchars($destination["nom"]) . "<br>";
                    echo "</td>";
                    echo "<td>";
                    echo htmlspecialchars($destination["description"]) . "<br>";
                    echo "</td>";
                    echo "<td>";
                    echo htmlspecialchars($destination["prix"]) . "<br>";
                    echo "</td>";
                    echo "<td>";
                    echo "<button>Modifier</button>";
                    echo "<button>Supprimer</button>";
                    echo "</td>";
                echo "</tr>";
            };
        ?>
    </tr>
</table>

<script type="text/javascript">
    function redirectToCreateDestination(){
        window.location.replace("../../controllers/admin/destinations-controller.php?action=create");
    }
</script>