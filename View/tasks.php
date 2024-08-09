<?php
    if(!isset($_SESSION)) session_start();;
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
        die();
    }
    include('../Model/model_tasks.php');
    $tasks = new Tasks();
    $allTasks = $tasks->get_allTasks($_SESSION['user_id']);
    include('templates/header.php');   
?>

    <div class='container container-tasks'>
        <?php    include('templates/navbar.php');  ?>

        <br>
        <h2>LISTA DE TAREAS</h2>
        <br>
        <button class="btn btn-newTask bg-secondary" onclick="window.location.assign('../View/new_task.php')">Nueva Tarea</button>
        <br>
        <table border='solid'>
            <thead style='text-align:center'>
                <tr>
                    <td>Titulo</td>
                    <td>Descripcion</td>
                    <td>Estado</td>
                    <td>Fecha</td>
                    <td>EDITAR</td>
                    <td>ELIMINAR</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allTasks as $task): ?>
                <tr>
                    <td><?php echo $task['title']?></td>
                    <td><?php echo $task['description']?></td>
                    <!-- <td><?php echo ($task['status'])? 'Terminada' : 'Pendiente'?></td> -->
                    <?= $task['status']? '<td style="color: turquoise">Terminado</td>' : '<td style="color: orange">Pendiente</td>'?>
                    <td><?php echo $task['date']?></td>
                    <td>
                        <form method='POST' action='../Controller/controller_tasks.php'>
                            <input type='hidden' name='id' value='<?=$task['id']?>'>
                            <input type='hidden' name='action' value='edit'>
                            <input type='submit' value='Editar' style='border: none; cursor: pointer;'>
                        </form>
                    </td>
                    <td>
                        <form method='POST' action='../Controller/controller_tasks.php'>
                            <input type='hidden' name='id' value='<?=$task['id']?>'>
                            <input type='hidden' name='action' value='delete'> 
                            <input type='submit' value='Eliminar' style='border: none; cursor: pointer; background: brown'>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php    include('templates/footer.php');  ?>
    </div>
    
