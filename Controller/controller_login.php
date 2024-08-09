<?php

if(isset($_POST['submit'])){
        require_once('../Model/model_user.php');

        $username = htmlspecialchars(stripslashes(trim($_POST['user'])));
        $password = htmlspecialchars(stripslashes(trim($_POST['pass'])));

        $user = new User();
        $login = $user->consult_user($username, $password);
        if(isset($login['username'])){            
            session_start();
            $_SESSION["user"] = $login['username'];
            $_SESSION["user_id"] = $login['id'];
            require_once('controller_tasks.php');            
        }else{            
            header('location:../index.php?error=true');
        }
    }else{ 
        require_once('./View/login.php');
    }