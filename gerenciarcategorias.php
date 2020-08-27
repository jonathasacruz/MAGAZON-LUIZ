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
            <table class=" col s12 stripped table highlight centered" id="tabela">
                <thead>
                    <tr class="row ">
                        <th class="col s3">Categoria</th>
                        <th class="col s7">Descrição</th>
                        <th class="col s2"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr class="linha">
                <td><input type="text" name="novaCategoria" placeholder="Digite para buscar ou incluir"></input></td>
                <td><input type="text" name="novaDescricao" placeholder="Digite para buscar ou incluir"></input></td>
                <td>
                    <i class="small material-icons hover-button" id="addBtn" onclick="editBtn(this)">add</i>
                    <i class="small material-icons hover-button" id="clearBtn">clear</i>
                </td>
            </tr> -->

                    <?php
                    $sql = "SELECT * FROM categorias";
                    $consulta = mysqli_query($connect, $sql);
                    $tabela = mysqli_fetch_all($consulta);

                    foreach ($tabela as $key => $value) :
                    ?>
                        <tr class="linha row" id="linha-<?php echo secure_data($value[0]) ?>">
                            <td class="col s3" id="categoria-<?php echo secure_data($value[0]) ?>">
                                <?php echo secure_data($value[1]) ?>
                            </td>
                            <td class="col s7" id="descricao-<?php echo secure_data($value[0]) ?>">
                                <?php echo secure_data($value[2]) ?>
                            </td>
                            <td class="row col s2">
                                <a class="col s3 btn-flat modal-trigger" href="#modalEdit">
                                    <i class="material-icons small white-text" id="editBtn-<?php echo secure_data($value[0]) ?>" onclick="editBtn(this)">edit</i>
                                </a>
                                <a class="col s3 offset-s1">
                                    <i class="material-icons small blue-text" id="listBtn-<?php echo secure_data($value[0]) ?>">list</i>
                                </a>
                                <a class="col s3 offset-s1">
                                    <i class="material-icons small red-text" id="deleteBtn-<?php echo secure_data($value[0]) ?>">delete_forever</i>
                                </a>

                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>


        <!-- MODAIS DA PÁGINA -->

        <!-- Modal de edição de categoria -->
        <div id="modalEdit" class="modal blue-grey darken-3 white-text">
            <div class="modal-content">
                <h4>Editar categoria</h4>
                <div>
                <h5>Nome da Categoria:</h5>
                <textarea class="white-text" id="nomeCategoria"></textarea>
                </div>
                <div>
                <h5>Descrição da Categoria:</h5>
                <textarea class="white-text" id="descricaoCategoria"></textarea>
                </div>
            </div>
            <div class="modal-footer blue-grey darken-3 white-text">
                <a href="#modalConfirmacao" class="modal-close modal-trigger waves-light waves-effect red darken-1 btn">GRAVAR!
                    <i class="small material-icons">add</i>

                </a>
                <a href="#!" class="modal-close waves-effect teal darken-1 btn">CANCELAR
                    <i class="small material-icons">clear</i>
                </a>
            </div>
        </div>

        <!-- Modal de confirmação de alteração -->
        <div id="modalConfirmacao" class="modal blue-grey darken-3 white-text">
            <div class="modal-content">
                <h4 class="red-text">Deseja confirmar a alteração?</h4>

            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-light waves-effect red darken-1 btn">CONFIRMAR
                    <i class="small material-icons">add</i>
                    <!-- gravar em banco de dados -->
                    <!-- Exibir mensagem de dados alterados com sucesso por 2 segundos, contador giratório, fecha automático -->
                    <!-- Atualiza linha da tabela na própria página com javascript sem recarregar a página -->
                </a>
                <a href="#!" class="modal-close waves-effect teal darken-1 btn">CANCELAR
                    <i class="small material-icons">clear</i>
                </a>
            </div>
        </div>
    <?php endif; ?>


    <?php
    require_once 'footer.php';
    ?>