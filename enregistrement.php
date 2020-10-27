<?php require __DIR__ . "/templates/header.tpl.php"; 

$bdd = new PDO('mysql:host=localhost;dbname=u_shall_not_pass', 'root', 'toor');

if(isset($_POST['sub']))
{
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $bDay = htmlspecialchars($_POST['bDay']);
  $mail = htmlspecialchars($_POST['mail']);
  $mailBis = htmlspecialchars($_POST['mailBis']);
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $passBis = password_hash($_POST['passBis'], PASSWORD_DEFAULT);
  $major = htmlspecialchars($_POST['major']);

  if(!empty($_POST['pseudo']) AND !empty($_POST['bDay']) AND !empty($_POST['mail']) AND !empty($_POST['mailBis']) AND !empty($_POST['pass']) AND !empty($_POST['passBis']) AND !empty($_POST['major']))
  {
    $pseudoLenght = strlen($pseudo);
    if($pseudoLenght <= 50)
    {
      if($mail === $mailBis)
      {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
          if($_POST['pass'] === $_POST['passBis'])
          {
            $insertMember = $bdd->prepare('INSERT INTO users(pseudo, mail, passwordH, bDay) VALUES(?, ?, ?, ?)');
            $insertMember->execute(array($pseudo, $mail, $pass, $bDay));
            $success = "Votre compte à bien été créé.";
          }
          else
          {
            $error = "Vos mots de passe ne correspondent pas.";
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

    <div class='form-group'>
      <label for="pseudo">Pseudo : </label>
      <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)){echo "$pseudo";} ?>">
    </div>

    <div class='form-group'>
      <label for="bDay">Date de naissance (jj/mm/aaaa) : </label>
      <input type="text" name="bDay" id="bDay" value="<?php if(isset($bDay)){echo "$bDay";} ?>">
    </div>

    <div class='form-group'>
      <label for="mail">Adresse e-mail : </label>
      <input type="mail" name="mail" id="mail" value="<?php if(isset($mail)){echo "$mail";} ?>">
    </div>

    <div class='form-group'>
      <label for="mailBis">Repeter l'adresse e-mail : </label>
      <input type="mail" name="mailBis" id="mailBis" value="<?php if(isset($mailBis)){echo "$mailBis";} ?>">
    </div>

    <div class='form-group'>
      <label for="pass">Mot de passe : </label>
      <input type="password" name="pass" id="pass">
    </div>

    <div class='form-group'>
      <label for="passBis">Repeter le mot de passe : </label>
      <input type="password" name="passBis" id="passBis">
    </div>

    <div class='form-check'>
      <input class='form-check-input' type="checkbox" name="major" id="major">
      <label class='form-check-label ml-3' for="major" id="major">En validant ce formulaire vous assurez avoir plus de 18ans.</label>
    </div>

    <input class='btn btn-lg btn-primary mt-3' type="submit" value="Inscription" name="sub">

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
    }
  ?>
</div>


 <?php require __DIR__ . "/templates/footer.tpl.php"; ?>