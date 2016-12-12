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
          <h2 class="sub-header">Головна</h2>
          <div class="list-group remind-list"> 
            <?php
              include ("functions/bd.php");
              $user_id = $_SESSION['id'];
              $date = date("Y-m-d H:i:s");
              
              $date_three_days = date('Y-m-d H:i:s', strtotime( "$date + 3 day" ));
              $date_five_minutes = date('Y-m-d H:i:s', strtotime( "$date + 5 minutes" ));
              $result = mysql_query("SELECT event.name, event.description FROM event left join event_type on (event_type.id = event.type) where event.user_id = '$user_id' and event.date > '$date' and ((event_type.reminder_type = 1 and event.date < '$date_three_days') or (event_type.reminder_type = 2 and event.date < '$date_five_minutes') )", $db);

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
          </div>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>