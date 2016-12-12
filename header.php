<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Smartone</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="style.css">
</head>
	<header class="navbar navbar-inverse navbar-fixed-top header" role="navigation">
		<div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand header__logo" href="/">SmartOne</a>
			</div>
			<div class="navbar-collapse collapse">
			<?php if (empty($_SESSION['login']) or empty($_SESSION['id'])): ?>
				<form class="navbar-form navbar-right login__form" role="form">
					<div class="form-group">
					  <input required name="login" type="text" size="15" maxlength="15" type="text" placeholder="Ваш логин" class="form-control">
					</div>
					<div class="form-group">
					  <input required name="password" type="password" size="15" maxlength="15" placeholder="Ваш пароль" class="form-control">
					</div>
					<button type="submit" name="submit" class="btn btn-success">Вхід</button>
					<a href="register.php" class="btn btn-primary">Реєстрація</a>
				</form>
			<?php else: ?>
				<div class="navbar-right header__logged fw">
					<h2 class="header__greeting">Привіт, <a class="header_acc-link" href="account.php"><?php echo $_SESSION['login']; ?></a></h2>
					<a href="logout.php" class="btn btn-primary">Вийти</a>
				</div> 
			<?php endif; ?>
			</div>
		</div>
	</header>
<body>