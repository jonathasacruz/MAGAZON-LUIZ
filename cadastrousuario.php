<?php
require_once 'db_connect.php';
require_once 'head.php';

?>

<?php

if (isset($_POST['cadastrar'])) {
	//Valida entradas e verifica campos obrigatórios
	$matricula =  (int)mysqli_real_escape_string($connect, $_POST['matricula']);
	$nome = mysqli_real_escape_string($connect, $_POST['nome']);
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	
	if (empty($matricula) || !is_int($matricula)) {
		$erros['matricula'] = '*Campo numérico obrigatório';
	}
	if (empty($nome)) {
		$erros['nome'] = '*Campo obrigatório';
	}
	if (empty($login)) {
		$erros['login'] = '*Campo obrigatório';
	}
	if (empty($senha)) {
		$erros['senha'] = '*Campo obrigatório';
	}
	//Consulta se já existe matrícula ou login no banco de dados
	if (!empty($matricula) && is_int($matricula) && !empty($nome) && !empty($login) && !empty($senha)) {
		$senha = password_hash($senha, PASSWORD_DEFAULT);
		$sql = "SELECT login, matricula FROM usuarios WHERE login = '$login' OR matricula = '$matricula'";
		$consulta = mysqli_query($connect, $sql);
		if (mysqli_num_rows($consulta) == 0) {
			$sql = "INSERT INTO usuarios (matricula, nome, login, senha) values ('$matricula','$nome','$login','$senha')";
			$consulta = mysqli_query($connect, $sql);
			if ($consulta) {
				$erros['no_login'] = 'Cadastro realizado com sucesso, faça login.';
				
			} else {
				$erros['no_login'] = 'Não foi possível realizar o cadastro, contacte o administrador do sistema';
			}
		} else {
			$erros['no_login'] = 'Login ou matrícula já cadastrados, tente um diferente';
		}
	}
	unset($_POST);
}

?>

<form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST">

	<label> Matrícula:</label>
	<input type="number" step="1" min="0" name="matricula">
	<span class="erro"><?php echo $erros['matricula']; ?></span>
	<br>
	<label> Nome:</label>
	<input type="text" name="nome">
	<span class="erro"><?php echo $erros['nome']; ?></span>
	<br>
	<label> Login:</label>
	<input type="text" name="login">
	<span class="erro"><?php echo $erros['login']; ?></span>
	<br>
	<label> Senha:</label>
	<input type="password" name="senha">
	<span class="erro"><?php echo $erros['senha']; ?></span>
	<br>
	<button type="submit" name="cadastrar">Cadastrar</button>
	<button type="button" name="index" onclick="location.href='index.php'">LOGIN</button>
</form>


<span class="erro"><?php echo $erros['no_login']; ?></span>
<br>
<?php
require_once 'footer.php';
?>