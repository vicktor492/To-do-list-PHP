<?php 
    include_once "msg_cadastro.php";
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

            <h5>Agora dê um nome para a lista e uma breve descrição</h5>

            <form action="model/insert_name_list.php" method="post">
                <div class="input-field">
                    <input type="text" name="name_list" id="name_list">
                    <label for="name_list">Dê um nome para a sua lista</label>
                </div>
                <div class="input-field">
                    <input type="text" name="desc_list" id="desc_list">
                    <label for="desc_list">Informe uma descrição breve</label>
                </div>
                <button type="submit" class="btn">Adicionar</button>
            </form>
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
