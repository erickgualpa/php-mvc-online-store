function loadProducts(category_id) {
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var category_id = category_id.toString();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("main-content").innerHTML = xmlhttp.responseText;
        }
    }
    //xmlhttp.open("GET", "controller/list_products.php?category=" + category_id, true);
    xmlhttp.open("GET", "index.php?action=list-products&category=" + category_id, true);
    xmlhttp.send();
}

function loadProductInfo(product_id, add_product) {
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var product_id = product_id.toString();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("main-content").innerHTML = xmlhttp.responseText;
        }
    }
    //xmlhttp.open("GET", "controller/product.php?product=" + product_id, true);

    xmlhttp.open("GET", "index.php?action=product-info&product=" + product_id, true);

    xmlhttp.send();
}

function addProductToCart(product_id){
    var price = $("#product-price").html();

    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var product_id = product_id.toString();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("summary").innerHTML = xmlhttp.responseText;
        }
    }
    //xmlhttp.open("GET", "controller/product.php?product=" + product_id, true);
    xmlhttp.open("GET", "index.php?action=add-product&product=" + product_id + "&price=" + price, true);
    xmlhttp.send();
}

function setCommand(){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("main-content").innerHTML = xmlhttp.responseText;
        }
    }
    //xmlhttp.open("GET", "controller/product.php?product=" + product_id, true);

    xmlhttp.open("GET", "index.php?action=set-command", true);

    xmlhttp.send();
}

function removeProductFromCart(product){
    window.location.href = "/index.php?action=show-cart&removeproduct=true&product="+product;
}

function hideCartSummary() {
    document.getElementById('cart-footer').style.display = 'none';
}

// Validación del usuario en la parte del servidor
$(function() {
    var validName = false;
    var validEmail = false;
    var validPassword = false;
    var validAddress = false;
    var ValidTown = false;
    var validPostalCode = false;

    $("#sign-up-name").focusout(function () {
        check_name();
    });

    $("#sign-up-email").focusout(function() {
        check_email();
    });

    $("#sign-up-password").focusout(function() {
        check_password();
    });

    $("#sign-up-address").focusout(function() {
        check_address();
    });

    $("#sign-up-town").focusout(function() {
        check_town();
    });

    $("#sign-up-postal-code").focusout(function() {
        check_postal_code();
    });


    function check_name() {
        var name = $("#sign-up-name").val();
        var patt = /^[a-zA-Z\\s]*$/;
        var validN = patt.test(name);

        if (!validN || name.length < 1) {
            //alert("El nombre de usuario que has introducido no es válido.");
        }else{
            validName = true;
        }
    }

    function check_email() {
        var email = $("#sign-up-email").val();
        var patt = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
        var validE = patt.test(email);

        if (!validE || email.length < 1) {
            //alert("El email que has introducido no es válido.");
        }else{
            validEmail = true;
        }
    }

    function check_password() {
        var password = $("#sign-up-password").val();
        var patt = /^[a-zA-Z0-9]*$/;
        var valid = patt.test(password);

        if (!valid || password.length < 1) {
            //alert("La contraseña que has introducido no es válida.");
        }else{
            validPassword = true;
        }
    }

    function check_address() {
        var address = $("#sign-up-address").val();
        var patt = /^[A-Za-z0-9- ]+$/;
        var valid = patt.test(address);

        if (!valid || address.length < 1 || address.length > 30){
            //alert("La dirección que has introducido no es válido.");
        }else{
            validAddress = true;
        }
    }

    function check_town() {
        var town = $("#sign-up-town").val();
        var patt = /^[a-zA-Z\\s]*$/;
        var valid = patt.test(town);

        if (!valid || town.length < 1 || town.length > 30 ){
            //alert("La población que has introducido no es válido.");
        }else{
            validTown = true;
        }
    }

    function check_postal_code() {
        var postalCode = $("#sign-up-postal-code").val();
        var patt = /^\d{4,5}$/;
        var valid = patt.test(postalCode);

        if (!valid || postalCode.length < 1){
            //alert("El código postal que has introducido no es válido.")
        }else{
            validPostalCode = true;
        }
    }

    $("#sign-up-container").submit(function() {
        if (!validName || !validEmail || !validPassword ||!validAddress || !validTown || !validPostalCode){
            //alert("Por favor, vuelve a intentarlo. Alguno de los campos no era correcto.");
        }
    });
});

// Mostrar menú desplegable de usuario

$(document).ready(
    function(){
        var userBoxValue = $("#user-box").html();
        if (userBoxValue.includes("USUARIO")){
            $(".show-options").hover(function() {
                $("#options-panel").show();
            }, function() {
                $("#options-panel").hide();
            });
    }
});




