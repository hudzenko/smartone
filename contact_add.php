<?php include 'header.php'; ?>
<div class="page contact-add">
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
          <h2 class="sub-header">Новий контакт</h2>
          <form class="contact-add__form">
            <div class="form-group">
              <label for="fullname">Ім’я</label>
              <input required type="text" class="form-control" id="fullname" name="fullname" placeholder="Ім’я контакту">
            </div>
            <div class="form-group">
              <label for="telephone">Телефон</label>
              <input required type="text" class="form-control" id="telephone" name="telephone" placeholder="Телефон">
            </div>
            <div class="form-group">
              <label for="datetimepicker-date">Дата народження</label>
              <div class='input-group date' id='datetimepicker-date'>
                    <input name="birthday" type='text' class="form-control" placeholder="День народження" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
              </div>
            </div>
            <div class="form-group">
              <label for="company">Організація</label>
              <?php include ("functions/get_all_companies.php"); ?>
              <select class="form-control" id="company" name="company">
              <option value="0">Не обрано. <?php if(!mysql_num_rows($result)) { ?>Немає доступних орагізацій.<?php }?></option>
              <?php
                while ($row = mysql_fetch_assoc($result)) {
              ?>
                <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
              <?php } 
                mysql_free_result($result);?>
              </select>
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            </div>
            <button type="submit" class="btn btn-primary">Додати</button>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>