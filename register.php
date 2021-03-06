<?php include 'header.php'; ?>
<div class="page page--full register">
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
	<div class="home__sign-wrap">
		<div class="home__sign">© EV_Hudzenko</div>
		<div class="home__sign-rights">All rights reserved</div>
	 </div> 
</div>
<?php include 'footer.php'; ?>
