<?php

    class Conexao{

        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db_name = "todo_list";

        public function db_connect(){
            try{
                $conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
                mysqli_set_charset($conn, 'utf8');

                return $conn;
            } catch (Exception $e){
                echo "Erro ao estabelecer conexão com o BD: ".$e->getMessage(); 
            }
        }
    }
