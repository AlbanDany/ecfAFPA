<?php ob_start(); ?>
<div class="container">
<form method="post">
		<fieldset >
				<table class="connexion_table">
					<tr>
						<td>Utilisateur</td>
						<td class="connexion"><input class= "connect_input" type="text"  pattern="[A-Za-z0-9]+" name="user"autofocus/></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td class="connexion"><input class= "connect_input" type="password"  name="mdp" /></td>
					</tr>
					<tr>
						<td><input class="connexion_button" type="submit" value="Connexion" name="btnConnexion"></td>
					</tr>
					<tr>
					<td>
						<?php if (isset ($_SESSION['message']))
						{
							echo $_SESSION['message'];
							$_SESSION['message'] = '';
						} ?>
					</td>
					</tr>
				</table>
		</fieldset>
	</form>
</div>
<?php $content = ob_get_clean();
require 'template.php';