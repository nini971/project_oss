<?php
$statusPass ='';
$statusEmail = '';
$valueEmail = '';
if(isset($_SESSION["status"])){
	if($_SESSION["status"] == 10){
		$statusPass = 'noCheck';
		$valueEmail = 'value="'. $_SESSION["emailTemp"] .'"';
	} elseif ($_SESSION["status"] == 20){
		$statusEmail = 'noCheck';
	}
}
?>
 <form method="post" action="connect.php">
  <label for="email">Identifiant (e-mail) :</label>
  <input class="<?php echo $statusEmail;?>" type="email" name="email" id="email" <?php echo $valueEmail;?> maxlength="50" placeholder="exemple@gmail.com" required/>
  <label for="password">Mot de passe :</label>
  <input class="<?php echo $statusPass;?>" type="password" name="password" id="password" maxlength="12" placeholder="******" required/>
  <input type="submit" value="Connexion" name="connexion" id="connexion"/>
</form>
<span>ou</span> <a id="inscription">
<button data-lien="/inscription" data-color="menuaccueil">Inscription</button>
</a>
