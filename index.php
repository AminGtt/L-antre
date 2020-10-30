<?php
session_start();
require __DIR__ . "/templates/header.tpl.php"; ?>

<body class="container">
  <main class="d-flex align-items-center flex-column">
    <h1 class="mt-5 mb-4">Bienvenue dans l'antre du chat fou!</h1>
    <p>Vous êtes perdu ou faites-vous parmis de nos habitués?</p>

    <div class="mb-4 mt-4">
      <a class="mr-3 ml-3" href="enregistrement.php">
        <button class="btn btn-lg btn-primary">Inscrivez-vous</button>
      </a>

      <a class="mr-3 ml-3" href="connexion.php">
        <button class="btn btn-lg btn-outline-primary">Connectez-vous</button>
      </a>
    </div>

    <a href="404.php">
        <button class="btn btn-lg btn-danger">Ou fuyez pauvre fou !</button>
    </a>

  </main>

</body>

<?php require __DIR__ . "/templates/footer.tpl.php" ?>