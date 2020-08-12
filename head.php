<!DOCTYPE html>
<html>

<head>
  <!-- Local aditional stylesheet -->
  <link href="style.css" rel="stylesheet">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

  <title>Magazon Luiz - Estoque</title>
</head>

<body class="blue-grey darken-4 blue-grey-text text-lighten-5">
  <div class="container">
    <?php
    $erros['matricula'] = $erros['nome'] = $erros['login'] = $erros['senha'] = $erros['no_login'] = "";
    session_start();
    $_SESSION['login'] = $_SESSION['login'] ?? NULL;
    $_SESSION['usuario'] = $_SESSION['usuario'] ?? NULL;


    ?>

    <div class="nav-wrapper blue-grey darken-3 blue-grey-text text-lighten-5">
      <h5 class="nav-title">Magazon Luiz - Estoque&nbsp;</h5>
    </div>

    <!-- Verifica se o usuário está logado e apresenta mensagem de boas vindas -->
    <?php
    if (!is_null($_SESSION['login'])) {
    ?>
      <text class="flow-text"> Bem vindo <?php echo $_SESSION['usuario']; ?> </text>
    <?php
    } ?>