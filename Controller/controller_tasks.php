<?php
    require_once('../model/model_tasks.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']){
            case 'edit':
                $id = htmlspecialchars(stripslashes(trim($_POST['id'])));    
                setcookie("id_user", $id, time() + (86400 * 30), "/"); 
                header('location:../View/edit_task.php');
                break;

            case 'create':
                $userId = htmlspecialchars(stripslashes(trim($_POST['userId'])));    
                $title = htmlspecialchars(stripslashes(trim($_POST['title'])));    
                $desc = htmlspecialchars(stripslashes(trim($_POST['description'])));    
                $status = htmlspecialchars(stripslashes(trim($_POST['status'])));  
                $task = new Tasks();
                $task->create_task($userId, $title, $desc, $status);
                header('location:../View/tasks.php');
                break;

            case 'update':
                $id = htmlspecialchars(stripslashes(trim($_POST['id'])));    
                $title = htmlspecialchars(stripslashes(trim($_POST['title'])));    
                $desc = htmlspecialchars(stripslashes(trim($_POST['description'])));    
                $status = htmlspecialchars(stripslashes(trim($_POST['status'])));  
                $task = new Tasks();
                $task->update_task($id, $title, $desc, $status);
                header('location:../View/tasks.php');
                break;

            case 'delete':
                $id = htmlspecialchars(stripslashes(trim($_POST['id'])));    
                $task = new Tasks();
                $delete = $task->delete_task($id);
                header('location:../View/tasks.php');
                break;
        }
    }else{
        header('location:../View/tasks.php');
    }
