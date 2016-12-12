<?php if(isset($_GET['id'])) {
    $current_company = $_GET['id'];
  } else{
    header('Location: /companies.php');
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
              <a href="company.php?id=<?php echo $current_company ?>" class="btn btn-default">Назад</a>  
            </div>
          </div>
          <?php include ("functions/get_current_company.php"); ?>
          <form class="company-edit__form">
            <div class="form-group">
              <label for="name">Назва</label>
              <input required type="text" class="form-control" id="name" name="name" placeholder="Ім’я контакту" value="<?php echo $item_row['name']; ?>">
            </div>
            <div class="form-group">
              <label for="address">Адреса</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Адреса" value="<?php echo $item_row['address']; ?>">
            </div>
            <div class="form-group">
              <label for="chief">Керівник</label>
              <?php include ("functions/get_all_contacts.php"); ?>
              <select class="form-control" id="chief" name="chief">
              <option value="0">Не обрано</option>
              <?php
                while ($row = mysql_fetch_assoc($result)) {
              ?>
                <?php if($row["id"] == $item_row['chief']): ?>
                  <option selected value="<?php echo $row["id"] ?>"><?php echo $row["fullname"] ?></option>
                <?php else : ?>
                  <option value="<?php echo $row["id"] ?>"><?php echo $row["fullname"] ?></option>
                <?php endif; ?>
              <?php } 
                mysql_free_result($result);?>
              </select>
            </div>
            <div class="form-group">
              <label for="telephone">Телефон</label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Телефон" value="<?php echo $item_row['telephone']; ?>">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $item_row['email']; ?>">
            </div>
            <input type="hidden" class="company-edit__id" name="item_id" value="<?php echo $current_company; ?>">
            <button type="submit" class="btn btn-primary">Зберегти</button>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>