<div class='container'>
    <div class='row'>
<?php
 $mysqli = new mysqli("db", "root", "example", "WebShop");
 $sql = 'SELECT * FROM Produkte';
 if ($result = $mysqli->query($sql)) {
  while ($data = $result->fetch_object()) {
      $posts[] = $data;
  }
}
$ads = array();
for($i = 0; $i < count($posts); $i++){
  if(isset($_COOKIE[$posts[$i]->id])){
    array_push($ads, $i);
    }
}
if(count($ads) < 3){
  $count = count($ads);
}else{
  $count = 3;
}
$rand_keys = array();
if(count($ads) > 1){
  $rand_keys = array_rand( $ads, $count);
  echo   "<h3 class='mt-3'>Auch Interesant:</h3>";
for($i = 0; $i < count($rand_keys); $i++){
    echo"
    <div class='mt-3 col-lg-4 col-md-3'>
              <div class='card'>";
                      echo "<a  onclick='show(".$posts[$rand_keys[$i]]->id.")' role='button'><img class='mx-auto d-block w-100' src='".$posts[$rand_keys[$i]]->mainPicture."'/></a>";
                  echo"
                  <div class='card-text'>
                  <h4><a onclick='show(".$posts[$rand_keys[$i]]->id.")' role='button'>".$posts[$rand_keys[$i]]->Name."</a></h4>
                  <p>Preis: ".$posts[$rand_keys[$i]]->price."€</p>
                  </div>
              </div>
          </div>
    ";
  }
}
?>
  </div>
</div>