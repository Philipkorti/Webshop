<?php
 $mysqli = new mysqli("db", "root", "example", "WebShop");
 $sql = 'SELECT * FROM Katogorien';
 if ($result = $mysqli->query($sql)) {
  while ($data = $result->fetch_object()) {
      $posts[] = $data;
  }
}
$q = $_GET['q'];

  if($q == 1){
    if(isset($posts)){
    foreach($posts as $post) {
      echo "<a type='button' onclick='loadproduct(0,2,\"".$post->Katogorien."\", \"\")'>".$post->Katogorien."</a><br/>";
    }
  }
  }else{
    echo "<label for='Katogorien' class='form-label'>Katogorien</label>
      <input class='form-control' id='katogorien' list='KatogorienOptions' placeholder='Type to search Katogorien'>";
      if(isset($posts)){
      echo "<datalist id='KatogorienOptions'>";
    foreach($posts as $post){
      echo "<option value=".$post->Katogorien.">";
    }
  }
}

  echo "</datalist>";


    
    
?>