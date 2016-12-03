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
          <h2 class="sub-header">Нова подія</h2>
          <form class="new-event__form">
            <div class="form-group">
              <label for="name">Назва події</label>
              <input required type="text" class="form-control" id="name" name="name" placeholder="Заголовок події">
            </div>
            
            <div class="form-group">
              <label for="type">Тип події</label>
              <select class="form-control" id="type" name="type">
              <?php
                include ("bd.php");
                $result = mysql_query("SELECT * FROM event_type", $db);
                // До тех пор, пока в результате содержатся ряды, помещаем их в ассоциативный массив.
                // Замечание: если запрос возвращает только один ряд - нет нужды в цикле.
                // Замечание: если вы добавите extract($row); в начало цикла, вы сделаете
                //            доступными переменные $userid, $fullname и $userstatus
                while ($row = mysql_fetch_assoc($result)) {
              ?>
                <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
              <?php } 
              mysql_free_result($result);
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="datetimepicker1">Дата і час</label>
              <div class='input-group date' id='datetimepicker1'>
                    <input required name="date" type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
              </div>
            </div>
            <div class="form-group">
              <label for="description">Опис події</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>