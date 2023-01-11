<?php
session_start();
$sortnum = $_GET['sort'];
$id = $_GET['id'];
$value = $_GET['value'];
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = 'SELECT * FROM Produkte';
if ($result = $mysqli->query($sql)) {
 while ($data = $result->fetch_object()) {
     $posts[] = $data;
 }
}
$sql = 'SELECT * FROM Likes';
if ($result = $mysqli->query($sql)) {
  while ($datac = $result->fetch_object()) {
      $likes[] = $datac;
  }
}
switch($sortnum){
  case 1:{
    $sort = 'date';
    break;
  }
  case 2:{
    $sort = 'staerne';
    break;
  }
  case 3:{
    $sort = 'date DESC';
    break;
  }
  case 4:{
    $sort = 'staerne DESC';
    break;
  }
}

$sql = "SELECT * FROM Rezensionen ORDER BY $sort";
if ($result = $mysqli->query($sql)) {
  while ($datab = $result->fetch_object()) {
      $rezes[] = $datab;
  }
}
echo "
<ul class='navbar-nav'>
<liclass='nav-item dropdown'>
<a class='nav-link dropdown-toggle' href='#' data-bs-toggle='dropdown' aria-expanded='false'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-funnel-fill' viewBox='0 0 16 16'>
<path d='M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z'/>
</svg></a><br/>
<ul class='dropdown-menu'>
<li>
<a class='dropdown-item' onclick='comment(1)' href='#'>Datum Aufsteigend</a>
<a class='dropdown-item' onclick='comment(3)' href='#'>Datum Absteigend</a>
<a class='dropdown-item' onclick='comment(2)' href='#'>Bewertung Aufsteigend</a>
<a class='dropdown-item' onclick='comment(4)' href='#'>Bewertung Absteigend</a>
</li>
</ul>
</li>
</ul>
";
if(isset($rezes)){#
  $procom = array();
foreach($rezes as $rez){
  if($rez->parent == $id){
    array_push($procom, $rez);
  }
}
}

$start = 5 * $value;
if($value == 0){
  $end = 5;
  if($end > count($procom)){
    $end =  count($procom);
  }
}else{
  $end = 5 * ($value+1);
  if($end > count($procom)){
    $end =  count($procom);
  }
}
if(isset($procom)){
  for($i = $start; $i < $end; $i++){
      echo "<h3>".$procom[$i]->title."</h3>";
      for($y = 0; $y < 5; $y++){
        if($y < $procom[$i]->staerne){
          echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star-fill' viewBox='0 0 16 16'>
          <path d='M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z'/>
        </svg>";
        }else{
          echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star' viewBox='0 0 16 16'>
          <path d='M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z'/>
        </svg>";
        }
      }
      echo"<p>Rezension von ".$procom[$i]->user." vom ".$rez->date."</p>
      <p>".$rez->text."</p>";
      if($procom[$i]->likes !=0){
        foreach($likes as $like){
          if($like->RezensionID == $procom[$i]->id){
            
            if($like->UserID == $_SESSION['userid']){
              echo "<a role='button'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-suit-heart-fill' viewBox='0 0 16 16'>
              <path d='M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z'/>
            </svg> ".$procom[$i]->likes."</a>";
            $check = false;
            }else{
              $check = true;
            }
          }
        }

        if($check == 1){
          echo "<a role='button' onclick='like(".$procom[$i]->id.",$id)'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-suit-heart' viewBox='0 0 16 16'>
          <path d='m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z'/>
        </svg> ".$procom[$i]->likes."</a>";
        }
       }else{
        echo "<a role='button' onclick='like(".$procom[$i]->id.",$id)'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-suit-heart' viewBox='0 0 16 16'>
        <path d='m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z'/>
      </svg> ".$procom[$i]->likes."</a>";
       }
      }
     
}
echo count($procom)/5;
echo "<nav aria-label='Page navigation example'>
<ul class='pagination justify-content-center'>";
for ($i=0; $i < count($procom) / 5; $i++) {
  $count = $i +1;
  if($i == $value){
    echo "<li class='page-item'><a class='page-link active' href='#' onclick='comment(1, $id, $i)'>".$count."</a></li>";
  }else{
    echo "<li class='page-item'><a class='page-link' href='#' onclick='comment(1, $id, $i)'>".$count."</a></li>";
  }
    
 
 
}
echo "</ul>
</nav>";
    
?>