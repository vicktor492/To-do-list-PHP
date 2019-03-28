<?php

    require_once "db_connect.php";

    session_start();
   
    if(isset($_SESSION['id'])){

        $connect = new Conexao();
        $link = $connect->db_connect();

        $name = mysqli_escape_string($link, $_POST['nome']);

        $sql = "UPDATE new_task SET name_task = '$name' WHERE id = '$id'";

        if(mysqli_query($link, $sql)){
            $_SESSION['msg'] = "Tarefa editado com sucesso";
            mysqli_close($link);
            header("Location: ../lists.php");
        } else {
            $_SESSION['msg'] = "Erro ao editar tarefa";
            mysqli_close($link);
            header("Location: ../lists.php");
        }
    }
