<?php
    // index.php
    session_start();
    include __DIR__.'/config.php';

    // Path del directorio que almacena todas las imágenes de perfil

    if (isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = "";
    }

    switch ($action) {
        case 'list-products':
            $category = $_GET['category'];
            include __DIR__.'/controller/list_products.php';
            break;

        case 'product-info':
            $product = $_GET['product'];
            include __DIR__.'/controller/product.php';
            break;

        case 'sign-up':
            include __DIR__.'/controller/sign_up.php';
            break;

        case 'register-user':
            include __DIR__.'/controller/register.php';
            break;

        case 'log-in':
            include __DIR__.'/controller/log_in.php';
            break;
        case 'start-session':
            include __DIR__.'/controller/start_session.php';
            break;

        case 'add-product':
            include __DIR__.'/controller/footer.php';
            break;

        case 'show-cart':
            include __DIR__.'/controller/cart.php';
            break;

        case 'set-command':
            include __DIR__.'/controller/command.php';
            break;

        case 'my-user':
            include __DIR__.'/controller/myUser.php';
            break;

        case 'update-user-info':
            include __DIR__.'/controller/updateUserInfo.php';
            break;

        case 'my-commands':
            include __DIR__.'/controller/myCommands.php';
            break;

        default:
            include __DIR__.'/controller/portada.php';
            break;
    }

