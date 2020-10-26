<?php require __DIR__ . "/templates/header.tpl.php" ?>

<body class="container">
  <main class="d-flex align-items-center flex-column">
    <h1>Bienvenue dans l'antre du chat fou!</h1>
    <p>Vous êtes perdu ou faites-vous parmis de nos habitués?</p>

    <div>
      <a href="enregistrement.php">
        <button class="btn btn-primary">Inscrivez-vous</button>
      </a>

      <a href="connexion.php">
        <button class="btn btn-outline-primary">Connectez-vous</button>
      </a>
    </div>

    <a href="#">
        <button class="btn btn-danger">Ou fuyez pauvre fou !</button>
    </a>

  </main>

</body>

<?php require __DIR__ . "/templates/footer.tpl.php" ?>