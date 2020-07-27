<?php
// view/myUser.php
?>
<!DOCTYPE html>
<html>
    <?php require(__DIR__."/../view/header.php");?>
    <body>
        <?php require(__DIR__."/../view/head.php"); ?>
        <div id="my-profile-container" class="grid-container">
            <div id="profile-title" style="grid-area: profileTitle">
                <p class="profile-panel-titles">MI CUENTA</p>
            </div>
            <div id="profile-image" style="grid-area: profileImage;">
                <img id="im-profile-image" src="<?php echo $user_profile_image;?>">
            </div>
            <div id="profile-message" style="grid-area: profileMessage;">
                <p class="message">
                    ¡Hola!<br>
                    Des de la página de Mi cuenta puedes ver la información de tu cuenta
                    y actualizarla. Pincha en el enlace para editarla.
                </p>
            </div>
            <div id="profile-info" style="grid-area: profileInfo;">
                <div id="account-information" class="flex-container">
                    <div id="contact-info" class="info-title">INFORMACIÓN DE CONTACTO</div>
                    <div id="contact-info-name" class="info-item"><?php echo $user_name?></div>
                    <div id="contact-info-email" class="info-item"><?php echo $user_email?></div>
                </div>
            </div>
            <div id="profile-address-info" style="grid-area: profileAddressInfo">
                <div id="account-address-information" class="flex-container">
                    <div id="address-info" class="info-title">¿A DÓNDE TE LO ENVIAMOS?</div>
                    <div id="address-info-address" class="info-item"><?php echo $user_address?></div>
                    <div id="address-info-town" class="info-item"><?php echo $user_town?></div>
                    <div id="address-info-postal-code" class="info-item"><?php echo $user_postal_code?></div>
                </div
            </div>
            <a href="/../index.php?action=update-user-info">
                <button id = "update-info-account" onclick="">UPDATE</button>
            </a>
        </div>

    </body>
</html>