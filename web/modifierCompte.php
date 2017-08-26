<?php
session_start();
?>
 <form id="formModif" method="post" action="compteModif.php" >
  <fieldset>
    <legend>Modifier compte</legend>
    <p>
      <label for="prenom">Prénom : </label>
      <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION[ "prenom" ];?>" maxlength="30" required/>
      <label for="nom">Nom : </label>
      <input type="text" name="nom" id="nom" value="<?php echo $_SESSION[ "nom" ];?>" maxlength="30" required/>
    </p>
    <p>
      <label for="pseudo">Pseudo : </label>
      <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION[ "pseudo" ];?>" maxlength="30" required/>
    </p>
    <p>
      <label for="email_ins">Email : </label>
      <input type="email" name="email" value="<?php echo $_SESSION[ "email" ];?>" pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$" id="email_ins" maxlength="50" placeholder="exemple@gmail.com" required/>
      <span id="email_check"></span>
    </p>
    <p>
      <label for="date_naiss">Date de naissance (jj/mm/aaaa) : </label>
      <input type="date" name="date_naiss" id="date_naiss" value="<?php echo $_SESSION[ "birthDate" ];?>" required/>
    </p>
    <p>
      <label for="favori">Lieux de chasse favori : </label>
      <input type="text" name="favori" id="favori" value="<?php echo $_SESSION[ "lieuxChasse" ];?>" maxlength="50" required/>
    </p>
    <p>
      <label for="experience">Expérience : </label>
      <select name="experience" id="experience">
        <option name="debutant">Débutant</option>
        <option name="intermediaire">Intermédiaire</option>
        <option name="confirme">Confirmé</option>
      </select>
    </p>
    <p>
      <label for="type">Type de chasse favorite : </label>
      <select name="type" id="type">
        <option name="agachon">Agachon</option>
        <option name="indienne">Indienne</option>
        <option name="coulee">Coulée</option>
      </select>
    </p>
    <div id="bouton">
      <input class="button" type="submit" value="Modifier" name="modifier" id="modifierCompte"/>
    </div>
  </fieldset>
</form>

