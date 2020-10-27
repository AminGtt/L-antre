<?php require __DIR__ . "/templates/header.tpl.php";

$bdd = new PDO('mysql:host=localhost;dbname=u_shall_not_pass', 'root', 'toor');

if(isset($_POST['sub']))
{
  $mail = htmlspecialchars($_POST['mail']);
  $passH = password_hash($_POST['pass'], PASSWORD_DEFAULT);

  if(filter_var($mail, FILTER_VALIDATE_EMAIL))
  {
    $mailToValidate = $bdd->prepare('SELECT * FROM users WHERE mail=?');
    $mailToValidate->execute([$mail]);
    $mailExist = $mailToValidate->rowCount();
    
    if($mailExist === 1)
    {
      $passToValidate = $bdd->prepare('SELECT * FROM users WHERE passH=?');
      $passToValidate->execute([$passH]);
      $passExist = $passToValidate->rowCount();
      if(password_verify($passExist, $passH))
      {
        echo 'Le mot de passe est valide!';
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


<?php require __DIR__ . "/templates/footer.tpl.php" ?>