<?php 

    include_once "msg_cadastro.php";

    include_once "config/db_connect.php";

    $connect = new Conexion();
    $link = $connect->db_connect();

    if(isset($_GET['id_todo'])){
        $_SESSION['id_todo'] = $_GET['id_todo'];
        $sql_s = "SELECT * FROM todo WHERE id = ".$_SESSION['id_todo'].";";
        $todo_result = mysqli_query($link, $sql_s);
        $dados_todo = mysqli_fetch_array($todo_result);
    }

    if(isset($_GET['name_todo'])){
        $name_todo = $_GET['name_todo'];
        $sql_s = "SELECT * FROM todo WHERE name_todo = '".$name_todo."';";
        $todo_result = mysqli_query($link, $sql_s);
        $dados_todo = mysqli_fetch_array($todo_result);
        $_SESSION['id_todo'] = $dados_todo['id'];
    }    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Tarefas</title>

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        .modal{
            z-index: 9999;
        }
    </style>        
</head>
<body>
    

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">
                <i class='medium material-icons'>format_list_bulleted</i> 
            To do list</a>        
        </div>
    </nav>    

    <div class="container">
        <div class="row">
        <h3 class="light"><?=$dados_todo['name_todo']?></h3>
        <h6 class="light"><?=$dados_todo['desc_todo']?></h6>        
            <table class="striped">
                <thead>
                    <th>Nome</th>
                    <th>Status</th>                    
                </thead>
                <tbody> 
                    <?php                        
                        $sql_select = "SELECT * FROM task WHERE id_todo =".$_SESSION['id_todo'].";";
                        $result = mysqli_query($link, $sql_select);

                        if(mysqli_num_rows($result) > 0){
                            while($dados = mysqli_fetch_array($result)){
                                if($dados['status_task'] == false){ 
                    ?>
                            <tr>
                                <td><?= $dados['name_task']?></td>
                                <td><?= $dados['status_task'] ? 'Tarefa concluida':'Em andamento'?></td>
                                <td><a href="edit.php?id=<?= $dados['id']?>&id_todo=<?=$_SESSION['id_todo']?>" class="btn-floating orange"><i class="material-icons">create</i></a></td>
                                <td><a href="model/done.php?id=<?= $dados['id']?>&id_todo=<?=$_SESSION['id_todo']?>" class="btn-floating green"><i class="material-icons">check</i></a></td>
                                <td>
                                    <button type="button" class="btn-floating red" data-toggle="modal" data-target="#modal<?=$dados['id']?>">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="modal<?=$dados['id']?>" role="dialog" aria-labelledby="title-modal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="title-modal">Opa!!</h5>                                    
                                            </div>
                                            <div class="modal-body">
                                                <p>Tem certeza que quer excluir um registro do banco?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="model/delete.php" method="POST">
                                                    <input type="hidden" name="delete" value="<?=$dados['id']?>">
                                                    <input type="hidden" name="id_todo" value="<?=$_SESSION['id_todo']?>">
                                                    <button type="button" class="waves-effect waves-light btn modal-trigger" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="waves-effect waves-light btn red modal-trigger">Sim, tenho certeza!</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                    <?php 
                                } else {
                    ?>
                            <tr>
                                <td>
                                    <del><?= $dados['name_task'] ?></del>
                                </td>
                                <td><?= $dados['status_task'] ? 'Tarefa concluida':'Em andamento'?></td>
                                <td><button type="button" class="hide"><i class="material-icons">create</i></button></td>
                                <td><button type="button" class="hide"><i class="material-icons">check</i></button></td>
                                <td>
                                    <button type="button" class="btn-floating red" data-toggle="modal" data-target="#modal<?=$dados['id']?>">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>

                                <div class="modal fade" id="modal<?=$dados['id']?>" role="dialog" aria-labelledby="title-modal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="title-modal">Opa!!</h5>                                    
                                            </div>
                                            <div class="modal-body">
                                                <p>Tem certeza que quer excluir um registro do banco?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="model/delete.php" method="POST">
                                                    <input type="hidden" name="delete" value="<?=$dados['id']?>">
                                                    <button type="button" class="waves-effect waves-light btn modal-trigger" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="waves-effect waves-light btn red modal-trigger">Sim, tenho certeza!</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>               
                    <?php                
                                }
                            }
                         mysqli_close($link); 
                        } else {?>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                    <?php
                            }?>    
                </tbody>
                
            </table>
            <form action="add.php" method="get">
                <input type="hidden" name="id_todo" value="<?=$_SESSION['id_todo']?>"/>
                <button type="submit" class="btn">Adicionar nova tarefa</button>
            </form>
            <br/>
            <form action="model/delete_list.php" method="post">
                <input type="hidden" name="delete_todo" value="<?=$_SESSION['id_todo']?>"/>
                <button type="submit" class="btn red">Apagar lista</button>                
            </form>
            <br/>
            <a href="index.php" class="btn orange">Sair da Lista</a>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        M.AutoInit();
    </script>         
</body>
</html>