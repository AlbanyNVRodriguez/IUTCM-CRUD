<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
        die();
    }
    include_once('templates/header.php');
?>
    <div class='container'> 
        <?php    include('templates/navbar.php');  ?>

        <form action="../Controller/controller_tasks.php" autocomplete='off' method='POST' class="form">
            <h2 style="text-align:center">Nueva Tarea</h2>
            <input type='hidden' name='action' value='create'>
            <input type='hidden' name='userId' value='<?= $_SESSION["user_id"]?>'>
            <label for="title">Titulo</label>
            <input type='text' name='title' value=''>
            <label for="description">Descripcion</label>
            <input type='text' name='description' value=''>
            <label for="status">Estado</label>
            <div style="display:flex; flex-flow: row no wrap">
                <span style="color: orange">Pendiente</span>
                <input type="radio" name="status" id="" value='0' checked> 
                <input type="radio" name="status" id="" value='1' > 
                <span style="color: turquoise">Terminado</span> 
            </div>
            <input type="submit" value="CREAR">
            <input type="button" value="REGRESAR" onclick="window.location.assign('tasks.php')">
        </form>
        <?php    include('templates/footer.php');  ?>
    </div>
