<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<div class="container">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="row">
<?php
$q = $_GET['suche'];
$q = strtolower($q);
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = 'SELECT * FROM Produkte';
if ($result = $mysqli->query($sql)) {
 while ($data = $result->fetch_object()) {
     $posts[] = $data;
 }
}
$sql = "SELECT * FROM Bilder";
if ($result = $mysqli->query($sql)) {
while ($data = $result->fetch_object()) {
 $bilder[] = $data;
}
}
if(isset($posts)){
    foreach ($posts as $post) {
        if(startsWith(strtolower($post->Name), $q)) {
            echo "
            <div class='col-lg-4 col-md-3' style='margin-top: 10px'>
                <div class='card'>";
                        echo "<a  onclick='show(".$post->id.")' role='button'><img class='mx-auto d-block w-100' src='$post->mainPicture'/></a>";
                    echo"
                    <div class='card-text'>
                    <h4><a onclick='show(".$post->id.")' role='button'>".$post->Name."</a></h4>
                    <p>Preis: ".$post->price."€</p>
                    </div>
                </div>
            </div>";
        }
       
    }
}
function startsWith( $haystack, $needle ) {
    $length = strlen( $needle );
    return substr( $haystack, 0, $length ) === $needle;
}
?>