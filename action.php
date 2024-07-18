<?php
if (isset($_POST['nom'])) {
    echo 'modifié!!';
}
else {
    header("Location: home.php");    // appel au fichier home.php lorsque l'on clique sur entrer sur le index.php
exit;
}
?>