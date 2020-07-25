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
    <button class="waves-effect waves-light btn" name="gerenciar-produtos" onclick="location.href='gerenciarprodutos.php'">Gerenciar Produtos</button>
    <button class="waves-effect waves-light btn" name="gerenciar-categorias" onclick="location.href='gerenciarcategorias.php'">Gerenciar Categorias</button>
    <button class="waves-effect waves-light btn" name="sair" onclick="location.href='logout.php'">SAIR</button>

    <table class="stripped responsive-table highlight" id="tabela">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Descrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr class="linha">
                <td><input type="text" name="novaCategoria" placeholder="Digite para buscar ou incluir"></input></td>
                <td><input type="text" name="novaDescricao" placeholder="Digite para buscar ou incluir"></input></td>
                <td>
                    <i class="small material-icons hover-button" id="addBtn" onclick="editBtn(this)">add</i>
                    <i class="small material-icons hover-button" id="clearBtn">clear</i>
                </td>
            </tr>

            <?php
            $sql = "SELECT * FROM categorias";
            $consulta = mysqli_query($connect, $sql);
            $tabela = mysqli_fetch_all($consulta);

            foreach ($tabela as $key => $value) :
            ?>
                <tr class="linha" id="linha-<?php echo $value[0] ?>">
                    <td id="categoria-<?php echo $value[0] ?>">
                        <?php echo $value[1] ?>
                    </td>
                    <td id="descricao-<?php echo $value[0] ?>">
                        <?php echo $value[2] ?>
                    </td>
                    <td>

                        <a class="btn-floating btn-small waves-effect waves-light blue lighten-2 btn modal-trigger hover-button" href="#modalEdit"><i class="small material-icons" id="editBtn-<?php echo $value[0] ?>" onclick="editBtn(this)">edit</i></a>
                        <i class="small material-icons hover-button" id="listBtn-<?php echo $value[0] ?>">list</i>
                        <i class="small material-icons hover-button" id="deleteBtn-<?php echo $value[0] ?>">delete_forever</i>

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

<div id="modalEdit" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>