<?php

    require_once "db_connect.php";

    $connect = new Conexao();
    $link = $connect->db_connect();

    $connect = new Conexao();
        $link = $connect->db_connect();

        $id = mysqli_escape_string($link, $_POST['delete']);

        $sql = "DELETE FROM  new_task WHERE id = '$id'";

        if(mysqli_query($link, $sql)){
            $_SESSION['msg'] = "Tarefa excluida com sucesso";            
            header("Location: ../lists.php");
            mysqli_close($link);
        } else {
            $_SESSION['msg'] = "Erro ao excluir tarefa";
            mysqli_close($link);
            header("Location: ../lists.php");
        }
