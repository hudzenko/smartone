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
          <?php echo $item_row['name'] ?>
          <br>
          <?php echo $item_row['address'] ?>
          <br>
          <?php echo $item_row['chief'] ?>
          <br>
          <?php echo $item_row['telephone'] ?>
          <br>
          <?php echo $item_row['email'] ?>
          <br>
          <div class="one-company__members">
          <h2>Члени організації</h2>
            <ul>
              <?php
              include ("functions/get_company_members.php");
              while ($row = mysql_fetch_assoc($query)) {
              ?>
              <li><a href="contact.php?id=<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></a></li>
              <?php } 
              mysql_free_result($query);
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>