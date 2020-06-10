<?php
// view/updateUserInfo.php
?>
<!DOCTYPE html>
<html>
    <?php require(__DIR__."/../view/header.php");?>
    <body>
        <?php require(__DIR__."/../view/head.php"); ?>
        <div id="update-profile-container" class="grid-container">
            <div id="profile-title" style="grid-area: profileTitle">
                <p class="profile-panel-titles">MI CUENTA</p>
            </div>
            <div id="profile-image" style="grid-area: profileImage;">
                <img id="im-profile-image" src="<?php echo $user_profile_image;?>">
            </div>
            <form method="post" enctype="multipart/form-data" style="grid-area: picForm" action="/index.php?action=update-user-info&update-image=true">
                <label>Actualiza tu foto de perfil </label><input type="file" name="profile_image"/>
                <input class="confirm-info-account" type="submit" value="SUBIR FOTO">
            </form>
            <div id="profile-message" style="grid-area: profileMessage;">
                <p class="message">
                    Des de aquí puedes actualizar toda la información de tu perfil. Introduce los campos que necesites y pulsa
                    confirmar.
                </p>
            </div>
            <form id="form-update-info" method="post" class="flex-container" style="grid-area: updateForm;" action="/index.php?action=my-user&update=true">
                <div id="update-profile-info">
                    <div id="update-account-information" class="flex-container">
                        <div id="contact-info" class="info-title">INFORMACIÓN DE CONTACTO</div>
                        <input id="update-info-name" class="update-item" placeholder="Tu nombre" name="newName"/>
                        <input id="update-info-email" class="update-item" placeholder="Tu e-mail" name="newEmail"/>
                    </div>
                </div>
                <div id="update-address-info">
                    <div id="update-address-information" class="flex-container">
                        <div id="address-info" class="info-title">¿A DÓNDE TE LO ENVIAMOS?</div>
                        <input id="update-info-address" class="update-item" placeholder="Tu dirección" name="newAddress"/>
                        <input id="update-info-town" class="update-item" placeholder="Población" name="newTown"/>
                        <input id="update-info-postal-code" class="update-item" placeholder="Código postal" name="newPostalCode"/>
                    </div
                </div>
                <input class="confirm-info-account" type="submit" value="CONFIRMAR">
            </form>

        </div>

    </body>
</html>