<!DOCTYPE html>
<html>
    <head>
        <?php require(__DIR__."/header.php");?>
    </head>

    <body>
        <?php require(__DIR__."/head.php"); ?>
        <div id="sign-up-body">
            <p class="message">
                Crea una cuenta
            </p>
            <form id="sign-up-container" class="grid-container" method="post" action="/index.php?action=register-user">
                <input id="sign-up-name" style="grid-area: nombre" placeholder="Nombre" type="text" name="name">
                <input id="sign-up-email" style="grid-area: email" placeholder="E-mail" type="text" name="email">
                <input id="sign-up-password" style="grid-area: password" placeholder="Password" type="password" name="password">
                <input id="sign-up-address" style="grid-area: direccion" placeholder="Dirección" type="text" name="address" >
                <input id="sign-up-town" style="grid-area: poblacion" placeholder="Población" type="text" name="town" >
                <input id="sign-up-postal-code" style="grid-area: codigoPostal" placeholder="Código Postal" type="text" pattern="\d{5}" name="postalCode">
                <div style="grid-area: submit">
                    <input type="submit" value="Registrarse">
                </div>
            </form>
        </div>
    </body>
</html>