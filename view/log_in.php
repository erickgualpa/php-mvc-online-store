<?php
//view/log_in.php
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require(__DIR__."/header.php");?>
    </head>

    <body>
        <?php require(__DIR__."/head.php"); ?>
        <div id="log-in-body" class = "flex-container">
            <div id="log-in-message">
                <p class="message">¿Aún no the has registrado? ¡REGÍSTRATE!</p>
                <button class="log-in-button">
                    <a class="link" href="/index.php?action=sign-up">CREAR UNA CUENTA</a>
                </button>
            </div>
            <div id="form-container">
                <p class="message"> Inicia sesión en tu cuenta </p>
                <?php
                    if (isset($_GET["fail"]) && $_GET["fail"] = true){
                        echo "<p class=\"message\"> Por favor, vuelve a intentarlo </p>";
                    }
                ?>
                <form method="post" action="/index.php?action=start-session">
                    <input placeholder="E-mail" type="email" name="email"><br>
                    <input placeholder="Password" type="password" pattern="[a-zA-Z0-9 ]+" name="password"><br>
                    <input class="log-in-button" type="submit" value="INICIAR SESIÓN">
                </form>
            </div>
        </div>
    </body>
</html>