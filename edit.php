<?php 
session_start();

$id = $_GET['id'];

$_SESSION['id'] = $id;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do List</title>

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
            <h3 class="light">Editar Cliente</h3>
            <form action="model/update.php" method="POST">
                <div class="input-field col s12">
                    <input type="text" class="input-field" name="nome" id="nome" />
                    <label for="nome">nome</label>
                </div>                           
                <button type="submit" id="btn" class="btn" name="btn-add">Editar</button>                
                <a href="lists.php" class="btn orange">Cancelar</a>
            </form>             
        </div>
    </div>    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
    <script>
        M.AutoInit();
    </script>    
</body>
</html>


