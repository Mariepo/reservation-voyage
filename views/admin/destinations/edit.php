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
            <input type="radio" name="disponibilite" id="true"  value="true" <?php if ($destination['disponibilite'] == 1) {echo 'checked';}?>>
            <label for="true">Disponible</label>
            <input type="radio" name="disponibilite" id="false" value="false" <?php if($destination['disponibilite'] == 0) {echo 'checked';}?>>
            <label for="false">Non disponible</label>
            <input type="radio" name="disponibilite" id="null" value="null" <?php if($destination['disponibilite'] === null) {echo 'checked';}?>>
            <label for="null">Ne pas indiquer</label>
    </div>

    <div>
        <label for="categorie">Catégorie</label>
        <select name="id_categorie" id="categorie">
            <?php foreach ($categories as $categorie): ?>
                <?php if (isCategoryInDestination($destinationCategories[$destination["id_destination"]], $categorie['nom'])): ?>
                    <option value="<?= htmlspecialchars($categorie['id_categorie']) ?>" selected><?= htmlspecialchars($categorie['nom']) ?></option>
                <?php else: ?>
                    <option value="<?= htmlspecialchars($categorie['id_categorie']) ?>"><?= htmlspecialchars($categorie['nom']) ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
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

<?php
    function isCategoryInDestination($cats, $category_name){
        if (empty($cats)){
            return true;
        }
        foreach ($cats as $cat) {
            if ($category_name == $cat['nom']) {
                return true;             
            }
        }
        return false;
    }; 


?>
