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
//“Tipo de categoria”, “Data da primeira inserção do produto”,“Data da última atualização do produto”
$estrutura ='<table>
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
';

echo $estrutura;

$sql = "SELECT * FROM produtos";
$consulta = mysqli_query($connect, $sql);
$tabela = mysqli_fetch_all($consulta);

foreach ($tabela as $key => $value) {
    $precoCompra = 'R$ '.number_format($value[3],2,",",".");
    $precoVenda = 'R$ '.number_format($value[4],2,",",".");
    $dataInsercao = date_format(date_create($value[5]),'d/m/Y');
    $dataAtualizacao = date_format(date_create($value[6]),'d/m/Y');
    echo "<tr><td>$value[1]</td>";
    echo "<td>$value[2]</td>";
    echo "<td>$precoCompra</td>";
    echo "<td>$precoVenda</td>";
    echo "<td>$value[7]</td>";
    echo "<td>$value[8]</td>";
    echo "<td>$dataInsercao</td>";
    echo "<td>$dataAtualizacao</td></tr>";
}
echo '</tr></table>';




}
?>


<?php
require_once 'footer.php';
?>