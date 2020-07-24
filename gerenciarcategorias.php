<?php
require_once 'db_connect.php';
require_once 'head.php';
?>

<?php

$login = mysqli_escape_string($connect, $_SESSION['login']);
$sql = "SELECT nome login FROM usuarios WHERE login = '$login'";
$consulta = mysqli_query($connect, $sql);
$usuario = mysqli_fetch_all($consulta);

if (mysqli_num_rows($consulta) != 1) : ?>
    <text> ESSA É UMA ÁREA RESTRITA, FAÇA LOGIN.</text> <br> <button type="button" name="index" onclick="location.href='index.php'">LOGIN</button>
<?php else : ?>
    <button type="button" name="gerenciar-produtos" onclick="location.href='gerenciarprodutos.php'">Gerenciar Produtos</button>
    <button type="button" name="gerenciar-categorias" onclick="location.href='gerenciarcategorias.php'">Gerenciar Categorias</button>
    <button type="button" name="sair" onclick="location.href='logout.php'">SAIR</button>

    <table class="stripped responsive-table highlight" id="tabela">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Descrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="novaCategoria"></input></td>
                <td><input type="text" name="novaDescricao"></input></td>
                <td></td>
            </tr>

            <?php
            $sql = "SELECT * FROM categorias";
            $consulta = mysqli_query($connect, $sql);
            $tabela = mysqli_fetch_all($consulta);

            foreach ($tabela as $key => $value) :
            ?>
                <tr class="linha">
                    <td id="categoria-<?php echo $value[0]?>">
                        <?php echo $value[1] ?>
                    </td>
                    <td id="descricao-<?php echo $value[0]?>">
                        <?php echo $value[2] ?>
                    </td>
                    <td>

                        <i class="material-icons hover-button" id="editBtn-<?php echo $value[0]?>" onclick="btnEditCat(this)">edit</i>
                        <i class="material-icons hover-button" id="listBtn-<?php echo $value[0]?>">list</i>
                        <i class="material-icons hover-button" id="deleteBtn-<?php echo $value[0]?>">delete_forever</i>

                    </td>
                </tr>
            <?php
            endforeach
            ?>
        </tbody>
    </table>
<?php endif; ?>


<?php
require_once 'footer.php';
?>