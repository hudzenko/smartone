<?php
  session_start();           
  include ("bd.php");
  $result = mysql_query("SELECT * FROM event where user_id='$user_id'", $db);
  while ($row = mysql_fetch_assoc($result)) {
?>
  <div class="list-group-item">
    <div class="row">
      <div class="col-md-9">
        <h4 class="list-group-item-heading"><?php echo $row["name"] ?></h4>
        <p class="list-group-item-text"><?php echo $row["description"] ?></p>
      </div>
    </div> 
  </div>
<?php } 
  mysql_free_result($result);
  ?>