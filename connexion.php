<?php require __DIR__ . "/templates/header.tpl.php" ?>

<!-- code here! -->
<form action="">
  <div class="container text-center mt-5 mb-5">
    <p class="font-weight-bolder">Alors comme ça il parait que vous faites partis des nôtres? Prouvez-le!</p>

    <div class="form-group">
      <label for="mail">Email : </label>
      <input type="mail">
    </div>

    <div class="form-group">
      <label for="pass">Mot de passe : </label>
      <input type="password">
    </div>

    <input type="submit" value="Connexion" class='btn btn-lg btn-success'>

  </div>
</form>


<?php require __DIR__ . "/templates/footer.tpl.php" ?>