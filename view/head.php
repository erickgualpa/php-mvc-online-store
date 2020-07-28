<?php
// view/head.php
?>
<header>
    <div>
        <a id="ali" href="/index.php">
            <img id="ali-logo" src="img/logo.jpg" alt="Ali logo" height="150">
        </a>
    </div>
    <div id="user-operations">
        <div id="log-in">
            <?php
                if (isset($_SESSION["verified"]) && $_SESSION["verified"] == true){
                    echo "<a href= '/../index.php?action=show-cart'>CART</a>";
                }else{
                    echo "<a href= '/../index.php?action=log-in'>LOG IN</a>";
                }
            ?>
        </div>
        <div id="sign-up" class="show-options">
            <?php
                if (isset($_SESSION["verified"]) && $_SESSION["verified"] == true){
                    echo "<a id ='user-box'href= '/../index.php?action=log-in'>USER</a>";
                }else{
                    echo "<a href= '/../index.php?action=sign-up'>SIGN UP</a>";
                }
            ?>
        </div>
    </div>
</header>
<div id = "options-panel" class="show-options">
    <div class="user-option">
        <a href= "/../index.php?action=my-user">My account</a>
    </div>
    <div class="user-option">
        <a href="/../index.php?action=my-commands">My orders</a>
    </div>
    <div class="user-option">
        <a href="/../index.php?finish-session=true">Sign off</a>
    </div>
</div>
