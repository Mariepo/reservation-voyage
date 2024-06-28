<h2>Êtes-vous sûrs de vouloir supprimer la destination suivante :  <?php echo $destination['nom'] ?> ?</h2>
<form action="../../controllers/admin/destinations-controller.php?action=confirmDelete" method="post">
    <input type="hidden" name="id_destination" value="<?php echo $destination["id_destination"]?>">
    <button type="submit">Je supprime</button>
</form>
<button onclick="redirectToIndexDestination()">Annuler</button>

<script>
    function redirectToIndexDestination(){
        window.location.replace("../../controllers/admin/destinations-controller.php");
    }
</script>