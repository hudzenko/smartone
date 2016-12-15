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
          <div class="one-company__header fw">
            <h2 class="sub-header">Деталі організації</h2>
            <div class="one-company__back-btn-wrap fw">
              <a href="edit-company.php?id=<?php echo $current_company; ?>" class="btn one-company__edit-btn btn-info">Редагувати організацію</a>  	
              <a href="companies.php" class="btn btn-default">Назад</a>  
            </div>
          </div>
          <?php include ("functions/get_current_company.php"); ?>
          <div class="company__info">
            <?php if($item_row['name']) : ?>
            <div class="company__info-item">
              <strong>Назва:</strong> <?php echo $item_row['name'] ?>
            </div>
            <?php endif; ?>
            <?php if($item_row['address']) : ?>
            <div class="company__info-item">
              <strong>Адреса:</strong> <?php echo $item_row['address'] ?>
            </div>
            <?php endif; ?>
            <?php if($item_row['chief']) : ?>
            <div class="company__info-item">
              <strong>Керівник:</strong> <a href="contact.php?id=<?php echo $item_row['chief'] ?>"><?php echo $item_row['chief_name'] ?></a>
            </div>
            <?php endif; ?>
            <?php if($item_row['telephone']) : ?>
            <div class="company__info-item">
              <strong>Телефон:</strong> <?php echo $item_row['telephone'] ?>
            </div>
            <?php endif; ?>
            <?php if($item_row['email']) : ?>
            <div class="company__info-item">
              <strong>E-mail:</strong> <?php echo $item_row['email'] ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="one-company__members">
          <h2>Члени організації</h2>
            <ol>
              <?php
              include ("functions/get_company_members.php");
              while ($row = mysql_fetch_assoc($query)) {
              ?>
              <li><a href="contact.php?id=<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></a></li>
              <?php } 
              mysql_free_result($query);
              ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>