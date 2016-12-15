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
          <div class="one-contact__header fw">
            <h2 class="sub-header">Деталі контакту</h2>
            <div class="one-contact__back-btn-wrap fw">
              <a href="edit-contact.php?id=<?php echo $current_contact ?>" class="btn one-contact__edit-btn btn-primary">Редагувати контакт</a>  	
              <a href="contacts.php" class="btn btn-default">Назад</a>  
            </div>
          </div>
          <?php include ("functions/get_current_contact.php"); ?>
          <div class="contact__info">
            <?php if($item_row['fullname']) : ?>
            <div class="contact__info-item">
              <strong>Ім’я:</strong> <?php echo $item_row['fullname'] ?>
            </div>
            <?php endif; ?>
            <?php if($item_row['telephone']) : ?>
            <div class="contact__info-item">
              <strong>Номер:</strong> <?php echo $item_row['telephone'] ?>
            </div>
            <?php endif; ?>
            <?php if($item_row['email']) : ?>
            <div class="contact__info-item">
              <strong>E-mail:</strong> <?php echo $item_row['email'] ?>
            </div>
            <?php endif; ?>
            <?php if($item_row['birthday']) : ?>
            <div class="contact__info-item">
              <strong>Дата народження:</strong> <?php echo $item_row['birthday'] ?>
            </div>
            <?php endif; ?>
            <?php if($item_row['company']) : ?>
            <div class="contact__info-item">
              <strong>Компанія:</strong> <a href="company.php?id=<?php echo $item_row['company']; ?>"><?php echo $item_row['company_name'] ?></a>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>