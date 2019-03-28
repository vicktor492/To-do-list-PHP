<?php
    session_start();

    require_once "db_connect.php";

    $connect = new Conexao();
    $link = $connect->db_connect();

    $sql_list = "DROP TABLE new_todo";

    if(mysqli_query($link, $sql_list)){
        $_SESSION['msg'] = "Lista foi apagada";        
        $sql_task = "DROP TABLE new_task";
        mysqli_query($link, $sql_task);
        mysqli_close($link);
        header('Location: ../index.php');
    } else {
        $_SESSION['msg'] = "Erro ao apagar lista";
        mysqli_close($link);
        header('Location: ../lists.php');
    }
