<form method="post" action="../../controllers/admin/destinations-controller.php?action=insert">

    <div>
        <label for="nom">Nom *</label>
        <input type="text" name="nom" id="nom">
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
    </div>

    <div>
        <label for="prix">Prix *</label>
        <input type="number" name="prix" id="prix">
    </div>

    <div>
        <input type="radio" name="disponibilite" id="true" value="true">
        <label for="true">Disponible</label>
        <input type="radio" name="disponibilite" id="false" value="false">
        <label for="false">Non disponible</label>
    </div>

    <div>
        <label for="categorie">Catégorie</label>
        <select name="id_categorie" id="categorie">
            <option value="">Sélectionner une catégorie</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= htmlspecialchars($categorie['id_categorie']) ?>"><?= htmlspecialchars($categorie['nom']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Ajouter">
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