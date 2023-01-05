<?php
session_start();
$picturecount = 0;
$id = $_GET['q'];
 $mysqli = new mysqli("db", "root", "example", "WebShop");
 $sql = 'SELECT * FROM Produkte';
 if ($result = $mysqli->query($sql)) {
  while ($data = $result->fetch_object()) {
      $posts[] = $data;
  }
}
$sql = 'SELECT * FROM Bilder';
if ($result = $mysqli->query($sql)) {
  while ($datab = $result->fetch_object()) {
      $bilder[] = $datab;
  }
}
$sql = 'SELECT * FROM Rezensionen';
if ($result = $mysqli->query($sql)) {
  while ($datab = $result->fetch_object()) {
      $rezes[] = $datab;
  }
}
$sql = 'SELECT * FROM Likes';
if ($result = $mysqli->query($sql)) {
  while ($datac = $result->fetch_object()) {
      $likes[] = $datac;
  }
}
echo "<div class='container'>
<div class='row justify-content-center' style='margin-top:100px'>";

foreach ($posts as $post) {
if($post->id == $id) {
echo "<div class='col-lg-6'>";
echo "<div id='carouselExampleCaptions' class='carousel slide' data-bs-ride='false'>
<div class='carousel-indicators'>
    <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'><img src=".$post->mainPicture." class='d-block w-100' alt='...'></button>";
    $picturecount = 0;
    if(isset($bilder)){
      foreach($bilder as $bild){
        if($bild->parent == $post->id){
          $picturecount++;
          echo " <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='$picturecount' aria-label='Slide 2'><img src=".$bild->URL." class='d-block w-100' alt='...'></button>";
        }
    }
    }
  echo "</div>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
      <img src=".$post->mainPicture." class='d-block w-100' alt='...'>
    </div>";
    if(isset($bilder)){
      foreach($bilder as $bild){
        if($bild->parent == $post->id){
          echo  "<div class='carousel-item'>
        <img src=".$bild->URL." class='d-block w-100' alt='...'>
      </div>";
        }
      }
    }
    
  echo "</div>
</div>";
echo "</div>";
echo "<div class='col-lg-5'>
<h1>".$post->Name."</h3>";
echo "<p>".$post->description."</p>
<p>Preis: ".$post->price."€</p>
<p> Stück: ".$post->inStock."</p>
<form>
Anzahl: <input type='number' id='stueck' min='1' max=".$post->inStock." value='1'><br/>
<br/><button class='btn btn-success' onclick='addWarenkorb(".$post->id.','.$_SESSION['userid'].")'>Hinzufügen</button>
</form>
</div>";
echo "<div class='row'>";
echo "<div class='col-lg-6' style='margin-top:20px'>";
$star = $post->evaluation;
$test = 'date';
echo "<a class='btn' onclick='comment(1, $id)'>";
for ($i=0; $i < 5; $i++) { 
  if($star >= 0.5 && $star <1){
    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star-half' viewBox='0 0 16 16'>
    <path d='M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z'/>
  </svg>";
  $star--;
  }else{
    if($star>1){
      echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star-fill' viewBox='0 0 16 16'>
      <path d='M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z'/>
    </svg>";
    $star--;
    }else{
      echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star' viewBox='0 0 16 16'>
      <path d='M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z'/>
    </svg>";
    }
  }
}
echo "<p>Bewertungen: ".$post->countevaluation."</p>";
echo "</a>";
echo "<div id='commentoutput'></div>";
}
}
echo"</div>";
echo "<div class='col-lg-6' style='margin-top:20px'>";
echo "<button class='btn btn-warning' onclick='loadnewevaluation(".$id.")' >Schreib eine Bewertung</button>";
echo "<div id='form'></div>";
echo "</div>";
echo "</div>";
echo "</html>"
?>