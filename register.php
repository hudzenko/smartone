<?php include 'header.php'; ?>
<div class="page register">
	<div class="register__wrap fw">
		<div class="register__content">
			<h1 class="register__title">Реєстрація</h1>
			<form action="save_user.php" class="register__form" method="post">
				<p>
				    <label>Ваш логін:<br></label>
				    <input required name="login" class="form-control" placeholder="Ваш логін" type="text" size="15" maxlength="15" autofocus>
				</p>
				<p>
				    <label>Ваш пароль:<br></label>
				    <input class="form-control" required name="password" type="password" size="15" maxlength="15" placeholder="Ваш пароль">
				</p>
				<p>
		    		<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Зареєструватися">
				</p>
			</form>
		</div>
	</div> 
</div>
<?php include 'footer.php'; ?>
