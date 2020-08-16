<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Local aditional stylesheet -->
  <link href="style.css" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

  <title>Magazon Luiz - Estoque</title>
</head>

<body class="container blue-grey darken-4 white-text">
  <!-- <div class="blue-grey darken-2"> -->

  <!-- Setando variáveis -->
  <?php
  $erros['matricula'] = $erros['nome'] = $erros['login'] = $erros['senha'] = $erros['no_login'] = "";
  $_SESSION['login'] = $_SESSION['login'] ?? NULL;
  $_SESSION['usuario'] = $_SESSION['usuario'] ?? NULL;
  ?>

  <!-- Barra de navegação superior com título, saudação e botões -->
  <header>
    <div class="navbar-fixed">
      <nav class="z-depth-1 blue-grey darken-3 white-text">
        <div class="nav-extended">
          <div class="nav-wrapper">
            <h5 class="center">Magazon Luiz - ESTOQUE</h5>
          </div>
          <h6>
            <?php
            if (!is_null($_SESSION['login'])) {
            ?>
              Bem vindo <?php echo $_SESSION['usuario']; ?>
            <?php
            } ?>
          </h6>
        </div>
      </nav>
    </div>
  </header>