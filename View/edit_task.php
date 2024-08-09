<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
        die();
    }
    
    if (array_key_exists('id_user', $_COOKIE)) {
        $id = $_COOKIE['id_user'];        
    } else {
        echo" La cookie id_user no existe";
    }
    include_once('../Model/model_tasks.php');
    $task = new Tasks();
    $data = $task->get_task($id); 

    unset($_COOKIE['id_user']);     

    include_once('templates/header.php');
?>
    <div class='container'> 
        <?php    include('templates/navbar.php');  ?>

        <form action="../Controller/controller_tasks.php" autocomplete='off' method='POST' class="form">
            <h2 style="text-align:center">Editar Tarea</h2>
            <input type='hidden' name='id' value='<?=$data['id']?>'>
            <input type='hidden' name='action' value='update'>
            <label for="title">Titulo</label>
            <input type='text' name='title' value='<?=$data['title']?>'>
            <label for="description">Descripcion</label>
            <input type='text' name='description' value='<?=$data['description']?>'>
            <label for="status">Estado</label>
            <div style="display:flex; flex-flow: row no wrap">
                <span style="color: orange">Pendiente</span>
                <input type="radio" name="status" id="" value='0' <?= $data['status']? "" : "checked" ?>> 
                <input type="radio" name="status" id="" value='1' <?= $data['status']? "checked" : "" ?>> 
                <span style="color: turquoise">Terminado</span> 
            </div>
            <input type="submit" value="ACTUALIZAR">
            <input type="button" value="REGRESAR" onclick="window.location.assign('tasks.php')">
        </form>
        <?php    include('templates/footer.php');  ?>
    </div>
