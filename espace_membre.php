<?php
session_start();
require __DIR__ . "/templates/header.tpl.php";

if(isset($_POST['deco'])){
  $_SESSION['connecte'] = 0;
  header("Location: http://localhost/projet_perso/L-antre/index.php");
}
var_dump($_POST);

?>

<h1 align='center'>Welcome Home :)</h1>

<main>
  <p>Bienvenue sur ta super page d'acceuil qui sera bientot personaliser! :)</p>
  <p>Tu auras accées a tout un tas de contenu spécialement preparé pour toi par le grand Chat Fou en personne !</p>
</main>

<div align='center'>
  <a class='btn btn-lg btn-outline-dark mt-3' href="index.php">Retour à l'acceuil</a>
  <form action="" method="POST">
    <input type="submit" value="Deconnexion" class='btn btn-lg btn-warning mt-3' name="deco">
  </form>
</div>


<?php require __DIR__ . "/templates/footer.tpl.php" ?>