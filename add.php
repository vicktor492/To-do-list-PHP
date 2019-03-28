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
            <form action="model/create.php" method="POST">
                <div class="input-field col s12">
                    <input type="text" class="input-field" name="nome" id="nome" required/>
                    <label for="nome">Digite o nome da tarefa</label>
                </div>                            
                <button type="submit" id="btn" class="btn" name="btn-add">Adicionar tarefa</button>
                <a href="lists.php" class="btn green" name="btn-list">Cancelar</a>                
            </form>             
        </div>
    </div>    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>     
</body>
</html>