<?php
    session_start();

    require_once "../config/db_connect.php";

    $connect = new Conexion();
    $link = $connect->db_connect();

    $id_todo = mysqli_escape_string($link, $_POST['delete_todo']);

    $sql_todo = "DELETE FROM todo WHERE id = ".$id_todo.";";
    
    mysqli_query($link, $sql_todo);
    
    $sql_task = "DELETE FROM task WHERE id_todo = ".$id_todo.";";
  
    if(mysqli_query($link, $sql_task)){
        $_SESSION['msg'] = "Lista foi apagada";
        mysqli_close($link);
        header('Location: ../index.php');
    } else {
        $_SESSION['msg'] = "Erro ao apagar lista";
        mysqli_close($link);
        header('Location: ../lists.php?id_todo='.$id_todo);
    }
