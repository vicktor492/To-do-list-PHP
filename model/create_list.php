<?php
    session_start();

    require_once "db_connect.php";

    $connect = new Conexao();
    $link = $connect->db_connect();    
    
    $sql = "CREATE TABLE new_todo(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name_list VARCHAR(50) NOT NULL,
            desc_list VARCHAR(50) NOT NULL,
            name_task VARCHAR(50) NOT NULL,
            status_task BOOLEAN NOT NULL
        )";

        if(mysqli_query($link, $sql)){
            $_SESSION['msg'] = "Lista criada";            
            mysqli_close($link);
            header('Location: ../insert_name_list.php');
        } else {
            $_SESSION['msg'] = "Erro ao criar lista";
            mysqli_close($link);
            header('Location: ../index.php');
        }
