<?php require __DIR__ . "/templates/header.tpl.php" ?>

<form action="">
  <div class="container text-center">
    <p class="text-center">Hmm, vous voulez faire parti de l'équipe? Renseignez les informations ci-dessous et vous en êtes. Du moins c'est ce qu'on vera x)</p>

    <div class='form-group'>
      <label for="pseudo">Pseudo : </label>
      <input class='' type="text" name="pseudo" id="pseudo">
    </div>

    <div class='form-group'>
      <label for="bDay">Date de naissance (jj/mm/aaaa) : </label>
      <input class='' type="text" name="bDay" id="bDay">
    </div>

    <div class='form-group'>
      <label for="mail">Adresse e-mail : </label>
      <input class='' type="mail" name="mail" id="mail">
    </div>

    <div class='form-group'>
      <label for="mailBis">Repeter l'adresse e-mail : </label>
      <input class='' type="mail" name="mailBis" id="mailBis">
    </div>

    <div class='form-group'>
      <label for="pass">Mot de passe : </label>
      <input class='' type="password" name="pass" id="pass">
    </div>

    <div class='form-group'>
      <label for="passBis">Repeter le mot de passe : </label>
      <input class='' type="password" name="passBis" id="passBis">
    </div>

    <div class='form-check'>
      <input class='form-check-input' type="checkbox" name="major" id="major">
      <label class='form-check-label' for="major" id="major">En validant ce formulaire vous assurez avoir plus de 18ans.</label>
    </div>

    <input class='btn btn-primary' type="submit" value="Inscription">

  </div>
</form>


<?php require __DIR__ . "/templates/footer.tpl.php" ?>