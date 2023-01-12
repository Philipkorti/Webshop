<?php
include "./header.php";
echo "<div class='container'>
<table class='table table-borderless'>
<tr>
<th>Produkt Name</th>
<th>Stück</th>
<th>Preis</th>
<th class='text-center'>Beschreibung</th>
<th>Katogorie</th>
<th></th>
<th></th>
</tr>";
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "SELECT * FROM Produkte";
if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $posts[] = $data;
    }
}

foreach($posts as $post) {
    echo "<tr>
    <td>".$post->Name."</td>
    <td>".$post->inStock."</td>
    <td>".$post->price."</td>
    <td>".$post->description."</td>
    <td>".$post->category."</td>
    <td><a href='./editproducts.php?p=".$post->id."' role='batten' class='btn btn-primary'>Manage</a></td>
    <td></td>
    </tr>";
}
echo"</table>
<a href='./addProduct.php'>Neues Produkt</a>
</div>"
?>