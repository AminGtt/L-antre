<?php

if(isset($_POST['deco'])){
  $_SESSION['connecte'] = false;
  header("Location: http://localhost/projet_perso/L-antre/index.php?page=home");
}

?>

<h1 align='center'>Welcome Home :)</h1>

<main>
  <p>Bienvenue sur ta super page d'acceuil qui sera bientot personaliser! :)</p>
  <p>Tu auras accées a tout un tas de contenu spécialement preparé pour toi par le grand Chat Fou en personne !</p>
</main>

<div align='center'>
  <a class='btn btn-lg btn-outline-dark mt-3' href="index.php?page=home">Retour à l'acceuil</a>

  <form action="" method="POST">
    <input type="submit" value="Deconnexion" class='btn btn-lg btn-warning mt-3' name="deco">
  </form>
  
</div>