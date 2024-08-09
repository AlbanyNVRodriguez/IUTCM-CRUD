<?php
    class Tasks{
        private $cn;
        
        public function __construct(){
            require_once('model_connection.php');
            $this->cn = Connection::connect();
        }

        public function __destruct(){
            $this->cn = null; 
        }

        public function get_Alltasks($user_id){
            $sql = 'SELECT * FROM tasks WHERE user_id = ?';
            $st = $this->cn->prepare($sql);
            $st->bindParam(1, $user_id);
            $st->execute();
            $tasks = $st->fetchAll();
            return $tasks;
        }

        public function get_task($id){
            $sql = 'SELECT * FROM tasks WHERE id = ?';
            $st = $this->cn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $task = $st->fetch(PDO::FETCH_ASSOC);
            return $task;
        }
        public function create_task($userId, $title, $desc, $status){
            $date = date("Y-m-d");
            $sql = 'INSERT INTO tasks (user_id, title, description, status, date) VALUES (?,?,?,?,?)';
            $st = $this->cn->prepare($sql);
            $st->bindParam(1, $userId);
            $st->bindParam(2, $title);
            $st->bindParam(3, $desc);
            $st->bindParam(4, $status);
            $st->bindParam(5, $date);
            $st->execute();
        }
        public function update_task($id, $title, $desc, $status){
            $sql = 'UPDATE tasks set title = ?, description = ?, status = ? WHERE id = ?';
            $st = $this->cn->prepare($sql);
            $st->bindParam(1, $title);
            $st->bindParam(2, $desc);
            $st->bindParam(3, $status);
            $st->bindParam(4, $id);
            $st->execute();
        }
        public function delete_task($id){
            $sql = 'DELETE FROM tasks WHERE id = ?';
            $st = $this->cn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
        }
    }
?>