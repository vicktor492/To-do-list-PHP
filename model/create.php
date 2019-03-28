<?php
    session_start();

    require_once "db_connect.php";

    $connect = new Conexao();
    $link = $connect->db_connect();

    $name = mysqli_escape_string($link, $_POST['nome']);

    $sql_insert = "INSERT INTO new_task(name_task, status_task) VALUES('$name', false)";

    if(mysqli_query($link, $sql_insert)){
        $_SESSION['msg'] = "tarefa cadastrada com sucesso";
        mysqli_close($link);
        header("Location: ../lists.php?sucess");            
    } else {
        $_SESSION['msg'] = "erro ao cadastrar tarefa";
        mysqli_close($link);
        header("Location: ../lists.php?erro");
    }
