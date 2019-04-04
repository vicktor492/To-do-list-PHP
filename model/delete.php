<?php

    require_once "../config/db_connect.php";    

        $connect = new Conexion();
        $link = $connect->db_connect();

        $id = mysqli_escape_string($link, $_POST['delete']);
        $id_todo = mysqli_escape_string($link, $_POST['id_todo']);

        $sql = "DELETE FROM task WHERE id = ".$id." AND id_todo = ".$id_todo.";";

        if(mysqli_query($link, $sql)){
            $_SESSION['msg'] = "Tarefa excluida com sucesso";            
            header("Location: ../lists.php?id_todo=$id_todo");
            mysqli_close($link);
        } else {
            $_SESSION['msg'] = "Erro ao excluir tarefa";
            mysqli_close($link);
            header("Location: ../lists.php?id_todo=$id_todo");
        }
