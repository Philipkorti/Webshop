<?php
$q = $_GET['pid'];

$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "DELETE FROM Produkte WHERE id = $q";
if ($result = $mysqli->query($sql)) {
    echo "<div class='alert alert-success' role='alert'>
    Das Produkt wurde erfolgreich gelöscht!
    </div>
    <a role='button' class='btn btn-primary' href='./../manageproducts.php'>Zurück zur Übersicht</a>
    ";
}else{
    echo "<div class='alert alert-danger' role='alert'>
     Beim löschen von dem Produkt ist ein Fehler aufgetretten.
     </div>";
}
?>