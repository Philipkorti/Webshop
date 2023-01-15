<?php
$mysqli = new mysqli("db", "root", "example", "WebShop");
$kat = $_GET['kat'];
$sql = "DELETE FROM Katogorien WHERE Katogorien = '$kat'";
if ($result = $mysqli->query($sql)) {
    echo "<div class='alert alert-success' id='output' role='alert'>
    Die Katogorie $kat wurde erfolgreich gelöscht!
    </div>
    ";
}else{
    echo "<div class='alert alert-danger' role='alert'>
     Beim löschen von der Katogorie $kat ist ein Fehler aufgetretten.
     </div>";
     echo $sql;
}

?>