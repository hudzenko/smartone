<?php include 'header.php'; ?>
<div class="page">
	<h2>Регистрация</h2>
    <form action="save_user.php" method="post">
		<p>
		    <label>Ваш логин:<br></label>
		    <input name="login" type="text" size="15" maxlength="15">
		</p>
		<p>
		    <label>Ваш пароль:<br></label>
		    <input name="password" type="password" size="15" maxlength="15">
		</p>
		<p>
    		<input type="submit" name="submit" value="Зарегистрироваться">
		</p>
	</form>
</div>
<?php include 'footer.php'; ?>
