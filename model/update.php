<?php

    require_once "../config/db_connect.php";

    $connect = new Conexion();
    $link = $connect->db_connect();

    $name = mysqli_escape_string($link, $_POST['nome']);
    $id = mysqli_escape_string($link, $_POST['id']);
    $id_todo = mysqli_escape_string($link, $_POST['id_todo']);

    $sql = "UPDATE task SET name_task = '".$name."' WHERE id = ".$id." AND id_todo = ".$id_todo.";";

    if(mysqli_query($link, $sql)){
        $_SESSION['msg'] = "Tarefa editada com sucesso";
        mysqli_close($link);
        header("Location: ../lists.php?id_todo=$id_todo");
    } else {
        $_SESSION['msg'] = "Erro ao editar tarefa";
        mysqli_close($link);
        header("Location: ../lists.php?id_todo=$id_todo");
    }   
    
