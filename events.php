<?php include 'header.php'; ?>
<div class="page account">
	<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="account.php">Головна</a></li>
            <li><a href="contacts.php">Контакти</a></li>
            <li><a href="companies.php">Організації</a></li>
            <li><a href="events.php">Події</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="events__header fw">
            <h2 class="sub-header">Події</h2>
            <div class="events__add-btn-wrap fw">
              <a href="event_add.php" class="btn btn-success">Додати подію</a>  
            </div>
          </div>
          <div class="list-group"> 
            <?php
              include ("functions/bd.php");
              $result = mysql_query("SELECT * FROM event", $db);
              while ($row = mysql_fetch_assoc($result)) {
            ?>
              <div class="list-group-item">
                <div class="row">
                  <div class="col-md-9">
                    <h4 class="list-group-item-heading"><?php echo $row["name"] ?></h4>
                    <p class="list-group-item-text"><?php echo $row["description"] ?></p>
                  </div>
                  <div class="col-md-3 fw event-item__buttons">
                    <a href="event_edit.php?id=<?php echo $row['id']; ?>"  class="btn btn-primary">Редагувати</a>
                    <a href="#" data-id="<?php echo $row['id'] ?>" class="btn btn-danger event-item__delete">Видалити</a>
                  </div>
                </div> 
              </div>
            <?php } 
              mysql_free_result($result);
              ?>
          </div>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>