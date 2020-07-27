<?php
// view/myCommands.php
?>
<!DOCTYPE html>
<html>
    <?php require(__DIR__."/../view/header.php");?>
    <body>
        <?php require(__DIR__."/../view/head.php"); ?>

        <div id="my-commands-panel" class="flex-container">
            <div id="my-commands-title"> MIS PEDIDOS</div>
            <?php
                // $result_set_my_commands
                $command = 0;
                $row = $result_set_my_commands->fetch_assoc();
                while($row != null){
                    if($row['command_id'] != $command){
                        $command = $row['command_id'];
                        echo '<div id="my-command" class="flex-container">';
                        echo '<div class="command-date">Pedido realizado el '.$row["command_date"].'</div>';
                    }
                    echo '<div class="command-product">
                            <div class = "command-image" style="grid-area: commandImage">
                                <img src="'.$row["product_image"].'">
                            </div>
                            <div class="command-product-item" style="grid-area: commandProduct;">'.
                                $row["product"].'
                            </div>
                            <div class="command-product-q" style="grid-area: commandProductQuantity;">Cantidad: '.
                                $row["quantity"].'
                            </div>
                            <div class="command-product-price" style="grid-area: commandProductPrice">Importe: '.
                                $row["productPrice"] .'
                            </div>
                          </div>';
                    $row = $result_set_my_commands->fetch_assoc();
                    if($row['command_id'] != $command){
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </body>
</html>