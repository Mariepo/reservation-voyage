<?php

echo "Page en cours de création, revenez plus tard :)";

echo "<br><button onclick='redirectToIndex()'>Retour</button>";

?>

<script type="text/javascript">
    function redirectToIndex(){
        window.location.replace("../../index.html");
    }
</script>