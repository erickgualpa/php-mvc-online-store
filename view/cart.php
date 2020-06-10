<?php
// view/cart.php
?>
<!DOCTYPE html>
<html>
<head>
    <?php require(__DIR__."/header.php");?>
</head>

<body>
    <?php require(__DIR__."/head.php"); ?>
    <div id="main-content">
        <div id="cart-body" class = "grid-container">
            <div id="message-banner" style = "grid-area: messageBanner;">
                ¡CONSIGUE ENVIOS GRATIS CON ALI BOXING+, CUANDO QUIERAS Y DONDE QUIERAS!
            </div>
            <div id="your-cart" class="flex-container" style = "grid-area: yourCart;">
                <div id = "your-cart-message">TU CARRITO</div>

                <div id = "products-cart-container" class="flex-container">
                    <?php
                    foreach ($result_set_products_in_cart as $prod){
                        while($row = $prod->fetch_assoc()) {
                            echo '<div id="product-cart-grid" class="grid-container">
                                    <div id="product-cart-image" style = "grid-area: productCartImage;">
                                        <img src="'.$row['product_image'] .'">
                                    </div>
                                    <div id = "product-cart-name" class="product-cart-text" style = "grid-area: productCartName;">
                                        <p>'.$row['product_name'] .'</p>
                                    </div>
                                    <div id = "product-cart-price" class="product-cart-text" style = "grid-area: productCartPrice;">
                                        <p>'.$row['price'] .'€</p>
                                    </div>
                                    <button id = "remove-cart-product" class = "product-cart-actions" style = "grid-area: removeCartProduct;" onclick="removeProductFromCart('.$row['product_id'].')">ELIMINAR</button>
                                    <button id = "view-product-cart" class = "product-cart-actions"style = "grid-area: viewCartProduct;" onclick="loadProductInfo('.$row['product_id'].', false)">VER</button>
                                 </div>';
                        }
                    }
                    ?>
                    <div id="check-out">
                        <button id = "check-out-button" class = "product-cart-actions" style = "grid-area: removeCartProduct;" onclick="setCommand();">CHECKOUT</button>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php require(__DIR__."/../view/footer.php");?>
</body>
</html>