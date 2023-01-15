<?php
include "./header.php";
?>
<div class="container">
<?php
$id = $_GET["p"];
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "SELECT * FROM Produkte";
if ($result = $mysqli->query($sql)) {
  while ($data = $result->fetch_object()) {
      $posts[] = $data;
  }
}

foreach($posts as $post) {
  if($post->id == $id) {
    echo " <form class='fileupload mt-3' action='./PHP/updateprodukte.php?p=".$id."' method='post'>
<div class='input-group mb-3'>
      <input type='text' class='form-control' placeholder='Title' id='title' Name='title' aria-label='Title' aria-describedby='basic-addon1' value='".$post->Name."'>
    </div>
    <div class='input-group mb-3'>
      <span class='input-group-text'>$</span>
      <input type='text' class='form-control' id='price' Name='price' aria-label='Amount (to the nearest dollar)' value='".$post->price."'>
    </div>
    <div id='outputkat'>
    </div>
    <div class='input-group mb-3 mt-3'>
      <input type='number' class='form-control' placeholder='Stück' id='stueck' Name='stueck' aria-label='Title' value='".$post->inStock."' aria-describedby='basic-addon1'>
    </div>
    <div class='input-group mb-3 mt-3'>
      <span class='input-group-text'>Beschreibung</span>
      <textarea class='form-control' id='beschreibung' Name='beschreibung' aria-label='With textarea'>$post->description</textarea>
    </div>
<button type='submit' id='upload-btn' class='btn btn-success mt-5 col-lg-5 me-5 ms-5'>Speichern</button>
<a href='./manageproducts.php' role='button' class='btn btn-danger mt-5 col-lg-5 ms-5'>Exit</a>
</form>
<a href='#' class='btn btn-danger col-lg-12' role='button' onclick='deleteproduct($post->id)'>Delete</a>
<p id='result'></p>
";
  }
}
?>
</div>