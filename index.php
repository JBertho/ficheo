<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
	</head>
	<body>
		<h1>Inscription</h1>
		<form method="post" action="inscription.php">
			<label for="pseudo">Pseudo:</label><br>
			<input type="text" name="pseudo" id="pseudo" maxlength="12" minlength="6" placeholder="Maximum 12 caractères" required><br>
			<label for="password">Mot de passe:</label><br>
			<input type="password" name="password" id="password" maxlength="12" minlength="6" placeholder="Maximum 12 caractères" required><br>
			<label for="confirm_password">Confirmation du mot de passe:</label><br>
			<input type="password" name="confirm_password" id="confirm_password" maxlength="12" minlength="6" placeholder="Maximum 12 caractères" required><br>
			<label for="email">E-mail:</label><br>
			<input type="email" name="email" id="email" required><br>
			<br>
			<input type="submit" value="S'inscrire">
		</form>
		<h1>Connexion</h1>
		<form method="post" action="connexion.php">
			<label for="pseudo">Pseudo:</label><br>
			<input type="text" name="pseudo" id="pseudo" maxlength="12" placeholder="Maximum 12 caractères" required><br>
			<label for="password">Mot de passe:</label><br>
			<input type="password" name="password" id="password" maxlength="12" placeholder="Maximum 12 caractères" required><br>
			<input type="submit" value="Se connecter">
		</form>
	</body>
</html>