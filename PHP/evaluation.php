<style>
.rate {
   float: left;
   height: 35px;
   
   margin-left: 25px;
}
.rate:not(:checked) > input {
   position:absolute;
   top:-9999px;
}
.rate:not(:checked) > label {
   float:right;
   width:1em;
   overflow:hidden;
   white-space:nowrap;
   cursor:pointer;
   font-size:25px;
   color:#ccc;
}
.rate:not(:checked) > label:before {
   content: '★ ';
}
.rate > input:checked ~ label {
   color: #000000;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
   color: #51565c;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
   color: #51565c;
}

</style>
<?php
$q = $_GET['q'];
echo "<p class='sternebewertung' style='margin-top: 20px'>
<link href='./CSS/stylesheet.css' rel='stylesheet'/>
<div class='rate ps-xs-1 ps-m-3 ml-m-5'>
    <input type='radio' id='star5' name='numrating' value='5' />
    <label for='star5' title='text'>5 stars</label>
    <input type='radio' id='star4' name='numrating' value='4' />
    <label for='star4' title='text'>4 stars</label>
    <input type='radio' id='star3' name='numrating' value='3' />
    <label for='star3' title='text'>3 stars</label>
    <input type='radio' id='star2' name='numrating' value='2' />
    <label for='star2' title='text'>2 stars</label>
    <input type='radio' id='star1' name='numrating' value='1' />
    <label for='star1' title='text'>1 star</label>
  </div>
</p>";
echo "<input type='text' maxlength='20' id='user' placeholder='Anzeigter Name' class='form-control' style='margin-top: 20px'/>
<input type='text' maxlength='50' id='title' placeholder='Titel' class='form-control' style='margin-top: 20px'>
<div class='form-floating' style='margin-top:20px'>
  <textarea class='form-control' placeholder='Leave a comment here' id='Comment' style='height: 100px'></textarea>
  <label for='Comment'>Dein Kommentar</label>
</div>
<a onclick='newevaluation($q);'><button class='btn btn-warning' style='margin-top: 20px' >Abschiken</button></a>";
?>
