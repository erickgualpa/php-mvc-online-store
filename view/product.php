<div id="product-info-container" class = "grid-container">
    <?php
    while($row = $result_set_product_info->fetch_assoc()) {
        echo '<div id="product-image" style = "grid-area: productImage;">
                    <img src="'.$row['product_image'] .'">
              </div>';

        echo '<div class="product-info" style = "grid-area: productName;">
                    <p id = "product-name" class="message">'.$row['product_name'] .'</p>
              </div>';

        echo '<div class="product-info" style = "grid-area: productDesc;">
                    <p id = "product-desc" class="message">'.$row['description'] .'</p>
              </div>';

        echo '<div class="product-info" style = "grid-area: productPrice;">
                    <p id = "product-price" class="message">'.$row['price'] .'€</p>
              </div>';
    }
    ?>

    <?php
        if (isset($_SESSION["verified"]) && $_SESSION["verified"] == true){
            echo '<button id = "product-add-cart" style = "grid-area: productAddCart;" onclick="addProductToCart('.$product.');">'.'ADD TO CART'.'</button>';
        }else{
            echo '<button id = "product-add-cart" style = "grid-area: productAddCart;" onclick="">'.'ADD TO CART'.'</button>';
        }
    ?>

</div>