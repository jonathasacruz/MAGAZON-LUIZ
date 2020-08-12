<?php
require_once 'db_connect.php';
require_once 'head.php';
?>

<?php
// Verifica se usuário preencheu login e senha
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
		// Verifica se usuário e senha após encriptação confere com o banco de dados e redireciona para a página de gerenciamento de categoria
		$passwordhash = mysqli_fetch_array($consulta);
		if (mysqli_num_rows($consulta) == 1 and password_verify($senha, $passwordhash['senha'])) {
			$_SESSION['login'] = $login;
			$_SESSION['usuario'] = $passwordhash['nome']; ?>
			<script>
				window.location = "gerenciarcategorias.php"
			</script>
<?php
		} else {
			$erros['no_login'] = "Usuário inexistente ou senha incorreta";
		}
	}
}

?>
<div class="row">
	<form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST">

		<div class="input-field col s12 m8 offset-m4 pull-m4">
			<i class="material-icons prefix">account_circle</i>
			<label for="login">Login:</label>
			<input type="text" id="login" name="login">
			<span class="erro"><?php echo $erros['login']; ?></span>
		</div>

		<div class="input-field col s12 m8 offset-m4 pull-m4">
			<i class="material-icons prefix">vpn_key</i>
			<label for="senha">Senha:</label>
			<input type="password" id="senha" name="senha">
			<span class="erro"><?php echo $erros['senha']; ?></span>
		</div>

		<div>
			<button class="col s5 m2 waves-effect waves-light btn-small" type="submit" name="botao-entrar">Entrar</button>
			<button class="col s5 push-s2 m2 push-m1 waves-effect waves-light btn-small" type="button" name="botao-cadastrar" onclick="location.href='cadastrousuario.php'">Cadastrar Usuário</button>
		</div>
	</form>
	<!-- Erro exibido em caso de erro no usuário ou senha -->
	<span class="erro"><?php echo $erros['no_login']; ?></span>
	<br>
</div>
<?php
require_once 'footer.php';
?>