<?php
    session_start();
    session_unset();
    session_destroy();
?>
<?php     include('templates/header.php');  ?>
    <div class="container container-login">
        <form action="./Controller/controller_login.php" method="post" class="form">
            <h1>To Do List</h1>
            <label for="user">Username</label>
            <input type="text" name="user" id="" placeholder="Jon Doe">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="" placeholder="********">
            <?php if(isset($_GET['error'])): ?>
                <p style="color: rgba(255, 0, 0,0.5); text-align: center;">Nombre de usuario o contraseña incorrectos.</p>
            <?php endif; ?>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
<?php    include('templates/footer.php');  ?>