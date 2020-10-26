<?php require __DIR__ . "/templates/header.tpl.php" ?>

<!-- code here! -->
<form action="">
  <div class="container text-center">
    <p>Alors comme ça il parait que vous faites partis des nôtres? Prouvez-le!</p>

    <div>
      <label for="mail">Email : </label>
      <input type="mail">
    </div>

    <div>
      <label for="pass">Mot de passe : </label>
      <input type="password">
    </div>

    <input type="submit" value="Connexion" class='btn btn-success'>

  </div>
</form>


<?php require __DIR__ . "/templates/footer.tpl.php" ?>