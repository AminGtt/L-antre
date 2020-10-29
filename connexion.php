<?php require __DIR__ . "/templates/header.tpl.php";

$bdd = new PDO('mysql:host=localhost;dbname=u_shall_not_pass', 'root', 'toor');
$_SESSION['connecte'] = "0";

if(isset($_POST['sub']))
{
  $mail = htmlspecialchars($_POST['mail']);
  $passToValidate = $_POST['pass'];

  if(filter_var($mail, FILTER_VALIDATE_EMAIL))
  {
    $mailToValidate = $bdd->prepare('SELECT * FROM user WHERE mail=?');
    $mailToValidate->execute([$mail]);
    $mailExist = $mailToValidate->rowCount();
    
    if($mailExist === 1)
    {
      $passInDb = $bdd->prepare('SELECT * FROM user WHERE mail=?');
      $passInDb->execute([$mail]);
      $passToCheck = $passInDb->fetch();
      $hToCheck = $passToCheck['passwordH'];

      if(password_verify($passToValidate, $hToCheck))
      {
        $_SESSION['connecte'] = "1";
        $_SESSION['idConnexion'] = $passToCheck['ID'];
        header("Location: http://localhost/projet_perso/L-antre/espace_membre.php?idConnexion=".$_SESSION['idConnexion']);
      }
      else
      {
        $error = 'Mot de passe incorect!';
      }
    }
    else
    {
      $error = 'Mail incorrect!';
    }
  }
}

?>

<form action="" method="POST">
  <div class="container text-center">
    <h3 class="text-center mt-5 mb-4 font-weight-bolder">Alors comme ça il parait que vous faites partis des nôtres? Prouvez-le!</h3>

    <table class="table table-striped table-bordered table-hover col-4 ml-auto mr-auto">
      <tr>
        <td align="right"><label for="mail">Email : </label></td>
        <td align="left"><input type="mail" name="mail" id="mail" autocomplete="off"></td>
      </tr>
      <tr>
        <td align="right"><label for="pass">Mot de passe : </label></td>
        <td align="left"><input type="password" name="pass" id="pass" autocomplete="off"></td>
      </tr>
    </table>

    <input type="submit" value="Connexion" class='btn btn-lg btn-success mt-3' name="sub">

  </div>
</form>

<div align='center' style="color:red;" class="font-weight-bolder mt-3">
  <?php
    if(isset($error))
    {
      echo $error;
    }
  ?>
</div>
<div align='center'>
  <a class='btn btn-lg btn-outline-dark mt-3' href="index.php">Retour à l'acceuil</a>
</div>


<?php require __DIR__ . "/templates/footer.tpl.php" ?>