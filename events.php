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
           <?php
              include ("functions/get_all_events.php");
            ?>
            <?php if(!mysql_num_rows($result)) : ?>
              <h4>Тут будуть відображатись ваші події. Вперед, додайте їх!!!</h4>
            <? else : ?>
              <div class="events-filter fw">
                <div class="filter-item fw">
                  <label for="filter__type">Тип події</label>
                  <select class="form-control" id="filter__type">
                  <option value="0">Всі типи подій</option>
                  <?php
                    include ("functions/bd.php");
                    $types = mysql_query("SELECT * FROM event_type", $db);
                    while ($row = mysql_fetch_assoc($types)) {
                  ?>
                    <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                  <?php } 
                  mysql_free_result($types);
                  ?>
                  </select>
                </div>
                <div class="filter-item fw">
                  <label for="filter__type">Дата події</label>
                  <div class='input-group date' id='datetimepicker-filter'>
                      <input type='text' class="form-control" id="datetimepicker-filter-input"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
              </div>
            <?php endif; ?> 
          <div class="list-group"> 
            <?php
              while ($row = mysql_fetch_assoc($result)) {
              $item_date = new DateTime($row["date"]);
            ?>
              <div class="list-group-item events__item" data-type="<?php echo $row["type"] ?>" data-date="<?php echo $item_date->format('Y-m-d'); ?>">
              <div class="events__item-type"><?php echo $row["type_name"] ?></div>
                <div class="row events__item-body fw">
                  <div class="col-md-6 events__item-descr">
                    <h4 class="list-group-item-heading"><?php echo $row["name"] ?></h4>
                    <p class="list-group-item-text"><?php echo $row["description"] ?></p>

                  </div>
                  <div class="col-md-3">
                    <div class="event__item-time event-time fw">
                      <div class="event-time__date">
                        <?php echo $item_date->format('Y-m-d'); ?>
                      </div>
                      <div class="event-time__time">
                        <?php echo $item_date->format('H:i'); ?>
                      </div>  
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="fw event-item__buttons">
                      <a href="event_edit.php?id=<?php echo $row['id']; ?>"  class="btn btn-sm events-item__edit-btn btn-primary">Редагувати</a>
                      <a href="#" data-id="<?php echo $row['id'] ?>" class="btn btn-sm btn-danger event-item__delete">Видалити</a>
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