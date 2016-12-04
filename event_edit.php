<?php if(isset($_GET['id'])) {
    $current_event = $_GET['id'];
  } else{
    header('Location: /events.php');
  }
?>
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
          <div class="events-edit__header fw">
            <h2 class="sub-header">Редагувати Подію</h2>
            <div class="events-edit__back-btn-wrap fw">
              <a href="events.php" class="btn btn-default">Назад</a>  
            </div>
          </div>
          <?php include ("functions/get_current_event.php"); ?>
          <form class="event-edit__form">
            <div class="form-group">
              <label for="name">Назва події</label>
              <input required type="text" class="form-control" id="name" name="name" placeholder="Заголовок події" value="<?php echo $item_row['name']; ?>">
            </div>
            <div class="form-group">
              <label for="type">Тип події</label>
              <select class="form-control" id="type" name="type">
              <?php
                $result = mysql_query("SELECT * FROM event_type", $db);
                while ($row = mysql_fetch_assoc($result)) {
              ?>
              <?php if($row["id"] == $item_row['type']): ?>
                <option selected value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
              <?php else : ?>
                <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
              <?php endif; ?>
              <?php } 
              mysql_free_result($result);
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="datetimepicker1">Дата і час</label>
              <div class='input-group date' id='datetimepicker1'>
                    <input required name="date" type='text' class="form-control" value="<?php echo $item_row['date']; ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
              </div>
            </div>
            <div class="form-group">
              <label for="description">Опис події</label>
              <textarea class="form-control" id="description" name="description" rows="3"><?php echo $item_row['description']; ?></textarea>
            </div>
            <input type="hidden" name="item_id" value="<?php echo $current_event; ?>">
            <button type="submit" class="btn btn-primary">Зберегти</button>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>