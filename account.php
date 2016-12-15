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
          <h3 class="main__subheader">Найближчі події</h3>
          <div class="list-group remind-list"> 
            <?php
              include ("functions/bd.php");
              $user_id = $_SESSION['id'];
              $date = date("Y-m-d H:i:s");
              
              $date_three_days = date('Y-m-d H:i:s', strtotime( "$date + 3 day" ));
              $date_five_minutes = date('Y-m-d H:i:s', strtotime( "$date + 5 minutes" ));
              $result = mysql_query("SELECT e.name, e.type, e.description, e.date, et.name as type_name FROM event e left join event_type et on (et.id = e.type) where e.user_id = '$user_id' and e.date > '$date' and ((et.reminder_type = 1 and e.date < '$date_three_days') or (et.reminder_type = 2 and e.date < '$date_five_minutes') )", $db);
               if(!mysql_num_rows($result)) { echo 'Найближчим часом подій немає, дякуємо що користуєтесь нашим сервісом. ;)'; }
              while ($row = mysql_fetch_assoc($result)) {
              $item_date = new DateTime($row["date"]);
            ?>
              <div class="list-group-item events__item" data-type="<?php echo $row["type"] ?>">
              <div class="events__item-type"><?php echo $row["type_name"] ?></div>
                <div class="row events__item-body fw">
                  <div class="col-md-6 events__item-descr">
                    <h4 class="list-group-item-heading"><?php echo $row["name"] ?></h4>
                    <p class="list-group-item-text"><?php echo $row["description"] ?></p>

                  </div>
                  <div class="col-md-6">
                    <div class="event__item-time event-time event-time--special fw">
                      <div class="event-time__date">
                        <?php echo $item_date->format('Y-m-d'); ?>
                      </div>
                      <div class="event-time__time">
                        <?php echo $item_date->format('H:i'); ?>
                      </div>  
                    </div>
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