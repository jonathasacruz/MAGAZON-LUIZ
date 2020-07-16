<?php
require_once 'db_connect.php';
require_once 'head.php';
?>

<?php

$login = mysqli_escape_string($connect, $_SESSION['login']);
$sql = "SELECT nome login FROM usuarios WHERE login = '$login'";
$consulta = mysqli_query($connect, $sql);
$usuario = mysqli_fetch_all($consulta);
if (mysqli_num_rows($consulta) != 1) {
    echo "<text color=\"red\"> ESSA É UMA ÁREA RESTRITA, FAÇA LOGIN.</text> <br> <button type=\"button\" name=\"index\" onclick=\"location.href='index.php'\">LOGIN</button>";
} else {
    echo "<button type=\"button\" name=\"gerenciar-produtos\" onclick=\"location.href='gerenciarprodutos.php'\">Gerenciar Produtos</button>";
    echo "<button type=\"button\" name=\"gerenciar-categorias\" onclick=\"location.href='gerenciarcategorias.php'\">Gerenciar Categorias</button>";
    echo "<button type=\"button\" name=\"sair\" onclick=\"location.href='logout.php'\">SAIR</button>";
?>
    <table>
        <tr>
            <th>Categoria</th>
            <th>Descrição</th>
        </tr>
        <tr>
            <td><input type="text" name="novaCategoria"></input></td>
            <td><input type="text" name="novaDescricao"></input></td>
        </tr>

        <?php
        $sql = "SELECT * FROM categorias";
        $consulta = mysqli_query($connect, $sql);
        $tabela = mysqli_fetch_all($consulta);

        foreach ($tabela as $key => $value) {
        ?>
            <tr>
                <td>
                    <?php echo $value[1] ?>
                </td>
                <td>
                    <?php echo $value[2] ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
?>


<?php
require_once 'footer.php';
?>