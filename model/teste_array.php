<?php

$arr = [];
    $value = 1;
    $value2 = "Teste";
    $value3 = false;

    $var = $_POST['var'];

    function setArray($value){
        
        $arr[] = $value;

        var_dump($arr);
    }

    $arr1 = array(1,2,3);

    setArray($arr1);
    $class = "teste";
    $fields = ['teste1', 'teste2'];
    $values = [];
    $arr2 = [1, "Teste"];

    function setValues($v){
        $values[] = $v;
    }

    function getValues(){
        return $values;
    }

    function getNameClass(){
        return $class;
    }
    setValues($arr2);
    
    $sql = "INSERT INTO ".getNameClass()."(".$fields[0].",".$fields[1].") VALUES('".getValues()[0]."','".getValues()[1]."');";

    echo $sql;
    
?>

<form action="" method="post">
<input type="text" name="var">
<button type="submit">Add</button>
</form>
