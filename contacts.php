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
            <h2 class="sub-header">Контакти</h2>
            <div class="contacts__add-btn-wrap fw">
              <a href="contact_add.php" class="btn btn-success">Додати контакт</a>  
            </div>
          </div>
          <?php
              include ("functions/get_all_contacts.php");
            ?>
            <?php if(!mysql_num_rows($result)) : ?>
              <h4>Тут будуть відображатись ваші контакти. Вперед, додайте їх!!!</h4>
            <? else : ?>
              <div class="contacts-filter fw">
                <div class="filter-item fw">
                  <label for="filter__birthday">Місяць народження</label>
                    <input type='number' min="1" max="12" step="1" class="form-control" pattern="[0-9]*" inputmode="numeric" id="filter__birthdays" placeholder="Введіть номер місяця" />
                </div>
              </div>
            <?php endif; ?>
          <div class="list-group contacts__list contacts-list fw"> 
            <?php
              while ($row = mysql_fetch_assoc($result)) {
            ?>
              <div class="list-group-item contacts-list__item contacts-item" data-birthday="<?php echo $row["birthday_month"]; ?>">
                <?php if($row["company_name"]) : ?>
                <div class="contacts-item__company"><?php echo $row["company_name"]; ?></div>
                <?php endif; ?>
                  <h4 class="list-group-item-heading contacts-item__name"><?php echo $row["fullname"] ?></h4>
                  <p class="list-group-item-text contacts-item__num"><?php echo $row["telephone"] ?></p>
                <div class="fw contacts-item__buttons">
                  <a href="contact.php?id=<?php echo $row['id']; ?>"  class="btn btn-sm btn-primary">Детальніше</a>
                  <a href="#" data-id="<?php echo $row['id'] ?>" class="btn btn-sm btn-danger contacts-item__delete">Видалити</a>
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
