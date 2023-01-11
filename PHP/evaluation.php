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
   font-size:40px;
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
echo "
<div class='card mt-2'>
<div class='card-text'>
<div class='rate ps-xs-1 ps-m-3 ml-m-5 mb-3 ms-3'>
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
</div>
<div class='card-text'>
<form>
<div class=>
<div class='form-floating m-3'>
<input type='text' maxlength='20' id='user' placeholder='Anzeigter Name' class='form-control'>
<label for='user'>Anzeigter Name</label>
</div>
<div class='form-floating m-3'>
<input type='text' maxlength='50' id='title' placeholder='Titel' class='form-control'>
<label for='title'>Titel</label>
</div>
<div class='form-floating m-3'>
  <textarea class='form-control' placeholder='Leave a comment here' id='Comment' style='height: 100px'></textarea>
  <label for='Comment'>Dein Kommentar</label>
</div>
<a onclick='newevaluation($q);' class='col-lg-10 btn btn-warning m-5'>Abschiken</a></div>
</form>
</div>
</div>";
?>
