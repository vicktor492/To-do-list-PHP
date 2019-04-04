<?php 
    session_start();

    if(isset($_SESSION['id_todo'])){
        $id_todo = $_SESSION['id_todo'];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>novo Cliente</title>

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">    
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
            <h3 class="light">Nova Tarefa</h3>
            <form action="model/create_task.php" method="POST">
                <div class="input-field col s12">
                    <input type="hidden" name="id_todo" value="<?=$id_todo?>">
                    <input type="text" class="input-field" name="name" id="nome" required/>
                    <label for="nome">Digite o nome da tarefa</label>
                </div>                            
                <button type="submit" id="btn" class="btn" name="btn-add">Adicionar tarefa</button>                
            </form>
            <br/>
            <form action="lists.php" method="get">
                <input type="hidden" name="id_todo" value="<?=$id_todo?>">
                <button type="submit" class="btn red">Cancelar</button>
            </form>
        </div>
    </div>    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>     
</body>
</html>