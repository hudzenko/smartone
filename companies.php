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
          <div class="contacts__header fw">
            <h2 class="sub-header">Організації</h2>
            <div class="contacts__add-btn-wrap fw">
              <a href="company_add.php" class="btn btn-success">Додати організацію</a>  
            </div>
          </div>
          <div class="list-group"> 
            <?php
              
              include ("functions/get_all_companies.php");
              while ($row = mysql_fetch_assoc($result)) {
            ?>
              <div class="list-group-item companies__item">
                <div class="row fw">
                  <div class="col-md-9">
                    <h4 class="list-group-item-heading"><?php echo $row["name"] ?></h4>
                    <p class="list-group-item-text"><?php echo $row["address"] ?></p>
                  </div>
                  <div class="col-md-3 fw companies-item__buttons">
                    <a href="company.php?id=<?php echo $row['id']; ?>"  class="btn btn-primary">Детальніше</a>
                    <a href="#" data-id="<?php echo $row['id'] ?>" class="btn btn-danger companies-item__delete">Видалити</a>
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