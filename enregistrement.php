<?php require __DIR__ . "/templates/header.tpl.php"; 

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
];

$bdd = new PDO('mysql:host=localhost;dbname=u_shall_not_pass; charset=utf8', 'root', 'toor', $options);

if(isset($_POST['sub']))
{
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $bDay = htmlspecialchars($_POST['bDay']);
  $mail = htmlspecialchars($_POST['mail']);
  $mailBis = htmlspecialchars($_POST['mailBis']);
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $passBis = password_hash($_POST['passBis'], PASSWORD_DEFAULT);
  
  if(!empty($_POST['pseudo']) AND !empty($_POST['bDay']) AND !empty($_POST['mail']) AND !empty($_POST['mailBis']) AND !empty($_POST['pass']) AND !empty($_POST['passBis']) AND !empty($_POST['major']))
  {
    $major = htmlspecialchars($_POST['major']);
    $pseudoLenght = strlen($pseudo);
    if($pseudoLenght <= 50)
    {
      if($mail === $mailBis)
      {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
          $reqMail = $bdd->prepare('SELECT * FROM user WHERE mail=?');
          $reqMail->execute(array($mail));
          $mailExist = $reqMail->rowCount();
          if($mailExist == 0)
          {
            if($_POST['pass'] === $_POST['passBis'])
            {
              $insertMember = $bdd->prepare('INSERT INTO user(pseudo, mail, passwordH, bDay) VALUES(?, ?, ?, ?)');
              $insertMember->execute([$pseudo, $mail, $pass, $bDay]);
              $success = "Votre compte à bien été créé.";
              header("Location: http://localhost/projet_perso/L-antre/connexion.php");
            }
            else
            {
              $error = "Vos mots de passe ne correspondent pas.";
            }
          }
          else
          {
            $error = 'Votre mail est deja utilisé.';
          }
        } 
        else
        {
          $error = "Votre mail n'est pas valide.";
        }
      }
      else
      {
        $error = 'Votre mail ne correspond pas.';
      }
    }
    else
    {
      $error = "Veuillez entrer un pseudo d'une longueur maximale de 50 caractères.";
    }
  } 
  else 
  {
    $error = "Tous les champs doivent être complété.";
  }
}

?>

<form method="POST" action="">

  <div class="container text-center">

    <h3 class="text-center mt-5 mb-4 font-weight-bolder">Hmm, vous voulez faire parti de l'équipe? Renseignez les informations ci-dessous et vous en êtes. Du moins c'est ce qu'on vera x)</h3>

    <table class="table table-striped table-bordered table-hover col-4 ml-auto mr-auto">

      <tr>
        <td align="right"><label for="pseudo">Pseudo : </label></td>
        <td align="left"><input type="text" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)){echo "$pseudo";} ?>" autocomplete="off"></td>
      </tr>

      <tr>
        <td align="right"><label for="bDay">Date de naissance (jj/mm/aaaa) : </label></td>
        <td align="left"><input type="date" name="bDay" id="bDay" value="<?php if(isset($bDay)){echo "$bDay";} ?>" autocomplete="off"></td>
      </tr>

      <tr>
        <td align="right"><label for="mail">Adresse e-mail : </label></td>
        <td align="left"><input type="mail" name="mail" id="mail" value="<?php if(isset($mail)){echo "$mail";} ?>" autocomplete="off"></td>
      </tr>

      <tr>
        <td align="right"><label for="mailBis">Repeter l'adresse e-mail : </label></td>
        <td align="left"><input type="mail" name="mailBis" id="mailBis" value="<?php if(isset($mailBis)){echo "$mailBis";} ?>" autocomplete="off"></td>
      </tr>

      <tr>
        <td align="right"><label for="pass">Mot de passe : </label></td>
        <td align="left"><input type="password" name="pass" id="pass" autocomplete="new-password"></td>
      </tr>

      <tr>
        <td align="right"><label for="passBis">Repeter le mot de passe : </label></td>
        <td align="left"><input type="password" name="passBis" id="passBis" autocomplete="new-password"></td>
      </tr>

    </table>
    
    <div class='form-check'>
      <input class='form-check-input' type="checkbox" name="major" id="major">
      <label class='form-check-label ml-3' for="major" id="major">En validant ce formulaire vous assurez avoir plus de 18ans.</label>
    </div>

    <input class='btn btn-lg btn-outline-dark mt-3' type="submit" value="Inscription" name="sub">

  </div>
</form>

<div align='center' style="color:red;" class="font-weight-bolder mt-3">
  <?php
    if(isset($error))
    {
      echo $error;
    }
    elseif(isset($success))
    {
      echo $success;

      $pseudo = '';
      $mail = '';
      $bDay = '';
      $mailBis = '';
    }
  ?>
</div>
<div align='center'>
  <a class='btn btn-lg btn-outline-dark mt-3' href="index.php">Retour à l'acceuil</a>
</div>

 <?php require __DIR__ . "/templates/footer.tpl.php"; ?>