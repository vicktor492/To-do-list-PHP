<?php 
    include_once "msg_cadastro.php";

    require_once "config/db_connect.php";
    $connect = new Conexion();
    $link = $connect->db_connect();
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
            Lista de Tarefas</a>        
        </div>
    </nav>    

    <div class="container">
        <div class="row">
            <h3 class="light">Seja bem vindo ao Gerenciador de To do List da Brains Developers</h3>

            <h5>Para iniciar crie uma nova lista</h5>

            <form action="insert_name_list.php" method="post">                
               <button type="submit" class="btn">Criar novo To do List</button>
            </form>
                     
        </div> 

        <h6>Ou</h6>       

        <!-- Button Trigger Modal -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Continuar com uma lista existente</a>
        
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Selecione uma lista para continuar</h4>
            <?php 
                $sql = "SELECT * FROM todo";
                $result = mysqli_query($link, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($dados = mysqli_fetch_array($result)){

                    
            ?>
                        <form action="lists.php" method="get">
                            <input type="text" class="hide" name="id_todo" value="<?= $dados['id'] ?>" />
                            <br/>
                            <button type="submit" class="btn"><?= $dados['name_todo'] ?></button>
                        </form>
            <?php
                    }
                } else {
            ?>
                    <h6>Desculpe! Mas parece que ainda não tem nenhuma lista criada</h6>
            <?php                    
                }
            ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="modal-close waves-effect waves-green btn-flat">Cancelar</button>
        </div>
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
