<form action="../../controllers/admin/destinations-controller.php?action=update" method="post">
    <input type="hidden" name="id_destination" value="<?php echo $destination["id_destination"]?>">
    <div>
        <label for="nom">Nom *</label>
        <input type="text" name="nom" id="nom" value="<?php echo $destination['nom'] ?>">
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?php echo $destination['description']?>">
    </div>

    <div>
        <label for="prix">Prix *</label>
        <input type="number" name="prix" id="prix" value="<?php echo $destination['prix']?>">
    </div>

    <div>
            <input type="radio" name="disponibilite" id="true" value="true" <?php if ($destination['disponibilite'] == 1) {echo 'checked';}?>>
            <label for="true">Disponible</label>
            <input type="radio" name="disponibilite" id="false" value="false" <?php if($destination['disponibilite'] == 0) {echo 'checked';}?>>
            <label for="false">Non disponible</label>
    </div>
    <div>
        <input type="submit" value="Modifier">
    </div>
</form>
<div>
        <button onclick="redirectToIndexDestination()">Annuler</button>
</div>

<script>
    function redirectToIndexDestination(){
        window.location.replace("../../controllers/admin/destinations-controller.php");
    }
</script>
