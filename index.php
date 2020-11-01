<?php
session_start();

require __DIR__ . "/includes/data.php";

if(empty($_SESSION['connecte']))
{
  $_SESSION['connecte'] = false;
}

$options = [
  PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
];

$bdd = new PDO('mysql:host=localhost;dbname=u_shall_not_pass', 'root', 'toor', $options);

if(empty($_GET['page']))
{
  $_GET['page'] = 'home';
}

if($_GET['page'] != 'home' && $_GET['page'] != 'connexion' && $_GET['page'] != 'inscription' && $_GET['page'] != 'espace_membre')
{
  $_GET['page'] = '404';
}

if(isset($_GET['page']))
{
  $pageToDisplay = $pages[$_GET['page']];
}

require __DIR__ . "/templates/header.tpl.php";

require __DIR__ . "/includes/" . $pageToDisplay;

require __DIR__ . "/templates/footer.tpl.php";
?>