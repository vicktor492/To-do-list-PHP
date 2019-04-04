<?php

    require_once "../config/db_connect.php";
    require_once "data.todo.php";

    session_start();

    $data = new DataTodo();
	$connect = new Conexion();
    $link = $connect->db_connect();

    $data->setName(mysqli_escape_string($link, $_POST['name_list']));
    $data->setDesc(mysqli_escape_string($link, $_POST['desc_list']));

    $name = $data->getName();
    $description = $data->getDesc();

    $sql = "
        INSERT INTO todo(name_todo, desc_todo)
        VALUES('".$name."', '".$description."');
    ";    

    if(mysqli_query($link, $sql)){
        $_SESSION['msg'] = "Lista criada com sucesso";         
        mysqli_close($link);
        header("Location: ../lists.php?name_todo=$name");
    } else {
        $_SESSION['msg'] = "Erro ao criar lista";
        mysqli_close($link);
        header("Location: ../index.php");
    }

