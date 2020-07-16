<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/ charset="UTF-8">

  <title>Magazon Luiz - Estoque</title>
</head>

<body>
<?php
$erros['matricula'] = $erros['nome'] = $erros['login'] = $erros['senha'] = $erros['no_login'] = "";
session_start();
$_SESSION['login'] = $_SESSION['login'] ?? NULL;
$_SESSION['usuario'] = $_SESSION['usuario'] ?? NULL;


?>
<h1>Magazon Luiz - Estoque</h1>

<?php
if (!is_null($_SESSION['login'])){
  ?>
  <text> Bem vindo <?php echo $_SESSION['usuario'];?> </text>
<?php
}?>

<hr>