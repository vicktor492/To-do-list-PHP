<?php

    require_once "../config/db_connect.php";

    session_start();

    $id = $_GET['id'];
    $id_todo = $_GET['id_todo'];

    $connect = new Conexion();
    $link = $connect->db_connect();

    $sql = "UPDATE task SET status_task = true WHERE id = ".$id." AND id_todo = ".$id_todo.";";

    if(mysqli_query($link, $sql)){
        $_SESSION['msg'] = "Tarefa concluida";
        mysqli_close($link);
        header("Location: ../lists.php?id_todo=$id_todo");
    } else {
        $_SESSION['msg'] = "Erro ao concluir tarefa";
        mysqli_close($link);
        header("Location: ../lists.php?id_todo=$id_todo");
    }
