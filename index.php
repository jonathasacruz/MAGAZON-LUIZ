<?php
require_once 'db_connect.php';
require_once 'head.php';
?>

<?php


if (isset($_POST['botao-entrar'])) {
	//Valida entradas e verifica campos obrigatórios
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	//$senha = password_hash($senha,PASSWORD_DEFAULT);
	if (empty($login)) {
		$erros['login'] = '*Campo obrigatório';
	}
	if (empty($senha)) {
		$erros['senha'] = '*Campo obrigatório';
		//Consulta usuário e senha no banco de dados
	} elseif (!empty($login) && !empty($senha)) {
		$erros['login'] = "";
		$erros['senha'] = "";
		$sql = "SELECT * FROM usuarios WHERE login = '$login'";
		$consulta = mysqli_query($connect, $sql);
		$passwordhash = mysqli_fetch_array($consulta);
		if (mysqli_num_rows($consulta) == 1 AND password_verify($senha,$passwordhash['senha'])) {
			$_SESSION['login'] = $login;
			header("Location: gerenciarestoque.php");
		} else {
			$erros['no_login'] = "Usuário inexistente ou senha incorreta";
		}
	}
}

?>

<form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST">

	<label> Login:</label>
	<input type="text" name="login">
	<span class="erro"><?php echo $erros['login']; ?></span>
	<br>
	<label> Senha:</label>
	<input type="password" name="senha">
	<span class="erro"><?php echo $erros['senha']; ?></span>
	<br>
	<button type="submit" name="botao-entrar">Entrar</button>
	<button type="button" name="botao-cadastrar" onclick="location.href='cadastrousuario.php'">Cadastrar Usuário</button>
</form>




<span class="erro"><?php echo $erros['no_login']; ?></span>
<br>




<?php
require_once 'footer.php';
?>