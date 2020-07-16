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
?>
    <text> ESSA É UMA ÁREA RESTRITA, FAÇA LOGIN.</text>
    <br>
    <button type="button" name="index" onclick="location.href='index.php'">LOGIN</button>
<?php
} else {
?>
    <button type="button" name="gerenciar-produtos" onclick="location.href='gerenciarprodutos.php'">Gerenciar Produtos</button>
    <button type="button" name="gerenciar-categorias" onclick="location.href='gerenciarcategorias.php'">Gerenciar Categorias</button>
    <button type="button" name="sair" onclick="location.href='logout.php'">SAIR</button>

    <table>
        <tr>
            <th>Produto</th>
            <th>Descrição</th>
            <th>Preço de Compra</th>
            <th>Preço de Venda</th>
            <th>Qtd. em estoque</th>
            <th>Categoria</th>
            <th>Data de inserção</th>
            <th>Última Atualização</th>
        </tr>
        <tr>
            <td><input type="text" name="novoProduto"></input></td>
            <td><input type="text" name="novaDescricao"></input></td>
            <td><input type="text" name="novoPrecoCompra"></input></td>
            <td><input type="text" name="novoPrecoVenda"></input></td>
            <td><input type="text" name="novaQtdEstoque"></input></td>
            <td><input type="text" name="novaCategoria"></input></td>
            <td><input type="text" name="novaDataInserção"></input></td>
            <td><input type="text" name="novaAtualizacao"></input></td>
        </tr>
            

        <?php
        $sql = "SELECT * FROM produtos";
        $consulta = mysqli_query($connect, $sql);
        $tabelaProdutos = mysqli_fetch_all($consulta);

        $sql = "SELECT * FROM categorias";
        $consulta = mysqli_query($connect, $sql);
        $categorias = mysqli_fetch_all($consulta);

        ?>

        <?php
        foreach ($tabelaProdutos as $key => $value) {
        ?>
            <tr>
                <?php

                $value[3] = 'R$ ' . number_format($value[3], 2, ",", ".");
                $value[4] = 'R$ ' . number_format($value[4], 2, ",", ".");
                $value[7] = date_format(date_create($value[7]), 'd/m/Y');
                $value[8] = date_format(date_create($value[8]), 'd/m/Y');
                $value[6] = $categorias[$value[6] - 1][1];

                foreach ($value as $key => $values) {
                    if ($key > 0) {
                ?>
                        <td>
                            <?echo $values?>
                        </td>
                <?php
                    }
                }
                ?>
            </tr>
        <?php
        } ?>
    </table>
<?php
}
?>

<?php
require_once 'footer.php';
?>