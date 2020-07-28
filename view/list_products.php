<?php
// view/list_products.php
?>
<div id="products-container" class="grid-container">
    <?php
    while($row = $result_set_product_list->fetch_assoc()) {
        echo '<div class="product" onclick="loadProductInfo('.$row['product_id'].', false)">
                    <img src="'.$row['product_image'] .'" >
                    <div id="name"><p class="message">'.$row['product_name'] .'</p> </div>
                    <div id="price"><p id="price">'.$row['price'].'€ </p></div>
              </div>';
    }
    ?>
</div>
