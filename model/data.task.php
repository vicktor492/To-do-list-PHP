<?php

    class DataTask
    {
        private $name_task;

        public function __construct()
        {
            $this->name_task = "";
        }

        public function setName($value)
        {
            $this->name_task = $value;            
        }
        public function getName(){
            return $this->name_task;
        }
    }
