<?php
// view/footer.php
?>

<footer id="cart-footer">
    <table id="command-summary">
        <tr>
            <th id="command-summary-title" class="command-summary-box">ORDER SUMMARY</th>
            <th class="command-summary-box">Products amount:
                <span id="products-amount"><?php
                    if (isset($_SESSION["cart"])){
                        echo count($_SESSION["cart"]);
                    }
                    ?></span>
            </th>
            <th class="command-summary-box">Total:
                <span id="total-amount"><?php
                    if (isset($_SESSION["totalAmount"])){
                        echo $_SESSION["totalAmount"] . "€";
                    }
                    ?></span>
            </th>
        </tr>
    </table>
</footer>
<?php
if (!isset($_SESSION["verified"])){
    echo "<script>hideCartSummary()</script>";
}else if($_SESSION["verified"] == false){
    echo "<script>hideCartSummary()</script>";
}
?>
