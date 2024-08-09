<?php
    class User{
    
        private $cn;
        private $user;

        public function __construct(){
            require_once("model_connection.php");
            $this->cn = Connection::connect();
        }

        public function __destruct(){           
            $this->cn = null; 
        }

        public function consult_user($username, $password){
            $sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
            $st = $this->cn->prepare($sql);
            $st->bindParam(1, $username);
            $st->bindParam(2, $password);
            $st->execute();
            $username = $st->fetch(PDO::FETCH_ASSOC);
            return $username;
        }
    }