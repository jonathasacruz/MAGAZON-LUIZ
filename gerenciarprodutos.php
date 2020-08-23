<?php
require_once 'db_connect.php';
require_once 'head.php';

?>

<?php

$login = secure_data(mysqli_escape_string($connect, $_SESSION['login']));
$sql = "SELECT nome login FROM usuarios WHERE login = '$login'";
$consulta = mysqli_query($connect, $sql);
$usuario = mysqli_fetch_all($consulta);

if (mysqli_num_rows($consulta) != 1) : ?>
    <text> ESSA É UMA ÁREA RESTRITA, FAÇA LOGIN.</text> <br> <button type="button" name="index" onclick="location.href='index.php'">LOGIN</button>
<?php else :

    require_once 'botoesnavegacao.php';
?>
    <!-- Área da tabela -->
    <div class="">
        <div class="row">
            <table class="col s12 stripped table highlight centered" id="tabela">
                <thead>
                    <tr>
                        <th >Produto</th>
                        <th >Descrição</th>
                        <th >Preço de Compra</th>
                        <th >Preço de Venda</th>
                        <th >Qtd. em estoque</th>
                        <th >Categoria</th>
                        <th >Data de inserção</th>
                        <th >Última Atualização</th>
                        <th ></th>
                    </tr>
                </thead>

                <tbody>
                    <!-- <tr>
            <td><input type="text" name="novoProduto"></input></td>
            <td><input type="text" name="novaDescricao"></input></td>
            <td><input type="text" name="novoPrecoCompra"></input></td>
            <td><input type="text" name="novoPrecoVenda"></input></td>
            <td><input type="text" name="novaQtdEstoque"></input></td>
            <td><input type="text" name="novaCategoria"></input></td>
            <td><input type="text" name="novaDataInserção"></input></td>
            <td><input type="text" name="novaAtualizacao"></input></td>
        </tr> -->


                    <?php
                    $sql = "SELECT * FROM produtos";
                    $consulta = mysqli_query($connect, $sql);
                    $tabelaProdutos = mysqli_fetch_all($consulta);

                    $sql = "SELECT * FROM categorias";
                    $consulta = mysqli_query($connect, $sql);
                    $categorias = mysqli_fetch_all($consulta);

                    foreach ($tabelaProdutos as $key => $value) :
                    ?>
                        <tr>
                            <?php

                            $value[3] = 'R$ ' . number_format(secure_data($value[3]), 2, ",", ".");
                            $value[4] = 'R$ ' . number_format(secure_data($value[4]), 2, ",", ".");
                            $value[7] = date_format(date_create(secure_data($value[7])), 'd/m/Y');
                            $value[8] = date_format(date_create(secure_data($value[8])), 'd/m/Y');
                            $value[6] = $categorias[secure_data($value[6]) - 1][1];

                            foreach ($value as $key => $values) :
                                if ($key > 0) :
                            ?>
                                    <td>
                                        <?php echo $values ?>
                                    </td>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </tr>
                    <?php
                    endforeach
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif ?>

<?php
require_once 'footer.php';
?>