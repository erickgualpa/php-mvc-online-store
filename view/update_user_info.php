<?php
// view/update_user_info.php
?>
<!DOCTYPE html>
<html>
    <?php require(__DIR__."/../view/header.php");?>
    <body>
        <?php require(__DIR__."/../view/head.php"); ?>
        <div id="update-profile-container" class="grid-container">
            <div id="profile-title" style="grid-area: profileTitle">
                <p class="profile-panel-titles">MY ACCOUNT</p>
            </div>
            <div id="profile-image" style="grid-area: profileImage;">
                <img id="im-profile-image" src="<?php echo $user_profile_image;?>">
            </div>
            <form method="post" enctype="multipart/form-data" style="grid-area: picForm" action="/index.php?action=update-user-info&update-image=true">
                <label>Update your profile image</label><input type="file" name="profile_image"/>
                <input class="confirm-info-account" type="submit" value="UPLOAD IMAGE">
            </form>
            <div id="profile-message" style="grid-area: profileMessage;">
                <p class="message">
                    Here you can update all your account information. Fill the fields you need and click on confirm.
                </p>
            </div>
            <form id="form-update-info" method="post" class="flex-container" style="grid-area: updateForm;" action="/index.php?action=my-user&update=true">
                <div id="update-profile-info">
                    <div id="update-account-information" class="flex-container">
                        <div id="contact-info" class="info-title">CONTACT INFORMATION</div>
                        <input id="update-info-name" class="update-item" placeholder="Tu nombre" name="newName"/>
                        <input id="update-info-email" class="update-item" placeholder="Tu e-mail" name="newEmail"/>
                    </div>
                </div>
                <div id="update-address-info">
                    <div id="update-address-information" class="flex-container">
                        <div id="address-info" class="info-title">WHERE DO WE SEND YOUR ORDERS TO?</div>
                        <input id="update-info-address" class="update-item" placeholder="Address" name="newAddress"/>
                        <input id="update-info-town" class="update-item" placeholder="Town" name="newTown"/>
                        <input id="update-info-postal-code" class="update-item" placeholder="Postal code" name="newPostalCode"/>
                    </div
                </div>
                <input class="confirm-info-account" type="submit" value="CONFIRM">
            </form>
        </div>
    </body>
</html>
