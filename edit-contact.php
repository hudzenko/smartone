<?php if(isset($_GET['id'])) {
    $current_contact = $_GET['id'];
  } else{
    header('Location: /contacts.php');
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
            <h2 class="sub-header">Редагувати контакт</h2>
            <div class="events-edit__back-btn-wrap fw">
              <a href="contact.php?id=<?php echo $current_contact ?>" class="btn btn-default">Назад</a>  
            </div>
          </div>
          <?php include ("functions/get_current_contact.php"); ?>
          <form class="contact-edit__form">
            <div class="form-group">
              <label for="fullname">Ім’я</label>
              <input required type="text" class="form-control" id="fullname" name="fullname" placeholder="Ім’я контакту" value="<?php echo $item_row['fullname']; ?>">
            </div>
            <div class="form-group">
              <label for="telephone">Телефон</label>
              <input required type="text" class="form-control" id="telephone" name="telephone" placeholder="Телефон" value="<?php echo $item_row['telephone']; ?>">
            </div>
            <div class="form-group">
              <label for="datetimepicker-date">Дата народження</label>
              <div class='input-group date' id='datetimepicker-date'>
                    <input name="birthday" value="<?php echo $item_row['birthday']; ?>" type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
              </div>
            </div>
            <div class="form-group">
              <label for="company">Організація</label>
              <?php include ("functions/get_all_companies.php"); ?>
              <select class="form-control" id="company" name="company">
              <option value="0">Не обрано</option>
              <?php
                while ($row = mysql_fetch_assoc($result)) {
              ?>
                <?php if($row["id"] == $item_row['company']): ?>
                  <option selected value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                <?php else : ?>
                  <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                <?php endif; ?>
              <?php } 
                mysql_free_result($result);?>
              </select>
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $item_row['email']; ?>">
            </div>
            <input type="hidden" class="contact-edit__id" name="item_id" value="<?php echo $current_contact; ?>">
            <button type="submit" class="btn btn-primary">Зберегти</button>
          </form>
          

        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>