<?php

	require_once "db_connect.php";

    session_start();

	$connect = new Conexao();
    $link = $connect->db_connect();

    $name_list = mysqli_escape_string($link, $_POST['name_list']);
    $desc_list = mysqli_escape_string($link, $_POST['desc_list']);

    $sql_insert = "INSERT INTO new_todo(name_list, desc_list) VALUE('$name_list', '$desc_list')";

    if(mysqli_query($link, $sql_insert)){
        $_SESSION['msg'] = "Nome e descrição foram incluidos";
        $sql_create = "CREATE TABLE new_task(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            name_task VARCHAR(50) NOT NULL,
            status_task VARCHAR(50) NOT NULL
            )";
        mysqli_query($link, $sql_create);
    	mysqli_close($link);
    	header("Location: ../lists.php");
    } else {
    	$_SESSION['msg'] = "Erro ao incluir nome e descrição";
    	mysqli_close($link);
    	header("Location: ../insert_name_list.php");
    }
