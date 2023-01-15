<?php
include "./header.php";
echo "<body>
<select class='form-select' id='optionload' onchange='manage(0,2,\"\");''  aria-label='Select option'>
  <option selected>Produkte</option>
  <option>Katogorien</option>
</select>
<div class='container' id='outputmanage'>
</div>
</body>
";
?>
 <div>
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2021 Juwelier Huemer, Inc</p>
      </footer>
    </div>
    <script>
    manage(0,2,"");
</script>