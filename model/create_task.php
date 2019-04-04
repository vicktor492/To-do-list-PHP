<?php
    session_start();

    require_once "../config/db_connect.php";
    require_once "data.task.php";
    require_once "data.todo.php";

    $data = new DataTask();
    $data_todo = new DataTodo();
    $connect = new Conexion();
    $link = $connect->db_connect();

    $data->setName(mysqli_escape_string($link, $_POST['name']));
    $id_todo = mysqli_escape_string($link, $_POST['id_todo']);

    $name = $data->getName();
    $date = date("Y-m-d");
    $sql = "
        INSERT INTO task(name_task, status_task, date_create, id_todo)
        VALUES('".$name."', false, '".$date."', ".$id_todo.");
    ";

    echo $sql;
    
    if(mysqli_query($link, $sql)){
        $_SESSION['msg'] = "Tarefa criada com sucesso";
        mysqli_close($link);
        header("Location: ../lists.php?id_todo=$id_todo");
    } else {
        $_SESSION['msg'] = "Erro ao criar tarefa";
        mysqli_close($link);
        header("Location: ../lists.php?id_todo=$id_todo");
    }
