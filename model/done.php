<?php

    require_once "db_connect.php";

    session_start();

    $_SESSION['id'] = $_GET['id'];
   
    if(isset($_SESSION['id'])){

        $id = $_SESSION['id'];

        $connect = new Conexao();
        $link = $connect->db_connect();

        $sql = "UPDATE new_task SET status_task = true WHERE id = '$id'";

        if(mysqli_query($link, $sql)){
            $_SESSION['msg'] = "Tarefa concluida";
            mysqli_close($link);
            header("Location: ../lists.php");
        } else {
            $_SESSION['msg'] = "Erro ao concluir tarefa";
            mysqli_close($link);
            header("Location: ../lists.php");
        }
    }
