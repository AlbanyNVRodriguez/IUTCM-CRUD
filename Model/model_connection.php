<?php
    class Connection{        
        public static function connect(){
            try{
                $connect = new PDO('mysql:host=localhost;dbname=todolist;', 'root', '');                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->exec("SET CHARACTER SET UTF8");
            }catch(Exception $e){
                echo("Error con la conexion" . $e->getMessage() . "\n");
                echo "Error en la linea: " . $e->getLine();
            }
            return $connect;
        }
    }