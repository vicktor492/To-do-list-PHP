<?php

    class DataTodo
    {
        private $name_todo;
        private $desc_todo;

        public function __construct()
        {
            $this->name_todo = "";
            $this->desc_todo = "";
        }

        public function setName($value)
        {
            $this->name_todo = $value;
        }
        public function setDesc($value)
        {
            $this->desc_todo = $value;            
        }
        public function getName()
        {
            return $this->name_todo;
        }
        public function getDesc() 
        {
            return $this->desc_todo;
        }
    }
