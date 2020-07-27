<?php
function getCategories($conn){
    $sql_categories = "SELECT category_name, category_id, category_image FROM CATEGORY";
    $result_categories = $conn->query($sql_categories);
    return $result_categories;
}

function getProducts($conn, $category){
    $sql_products = "SELECT product_id, product_name, product_image, price
                     FROM PRODUCT
                     WHERE category_id = $category";
    $result_products= $conn->query($sql_products);
    return $result_products;
}

function getProductInfo($conn, $product){
    $sql_product = "SELECT product_image, product_id, product_name, description, price
                FROM PRODUCT
                WHERE product_id = $product;";
    $result_product_info = $conn->query($sql_product);
    return $result_product_info;
}

function registerUser($conn){
    $sql = "INSERT INTO USER (user_name, email, password, address, town, postalCode)
    VALUES (?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    $user_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt->bind_param("ssssss",
        $_POST["name"],
        $_POST["email"],
        $user_password,
        $_POST["address"],
        $_POST["town"],
        $_POST["postalCode"]
    );

    if ($stmt->execute() === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function setCommandInfo($conn, $date, $cart_size, $total_amount, $username){
    $sql = "INSERT INTO COMMAND
            SET created = ?,
            num_elements = ?,
            import_total = ?,
            user_command = (
            SELECT user_id
            FROM USER
            WHERE email = ?
            LIMIT 1)";

    $stmt = $conn->prepare($sql);

    //$user_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt->bind_param("ssss",
        $date,
        $cart_size,
        $total_amount,
        $username
    );

    if ($stmt->execute() === TRUE) {
        //echo "New record created successfully";
        return true;
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function getLastCommandId($conn){
    $sql_command_id =   "SELECT command_id
                         FROM COMMAND
                         ORDER BY command_id desc";
    $result_command_id= $conn->query($sql_command_id);
    return $result_command_id;
}

function setCommandLineInfo($conn, $total_price, $product_id, $quantity,$command_id){
    $sql = "INSERT INTO COMMAND_LINE
            SET total_price = ?,
            product = (
            SELECT product_id
            FROM PRODUCT
            WHERE product_id = ?
            LIMIT 1),
            quantity = ?,
            command_id = (
            SELECT command_id
            FROM COMMAND
            WHERE command_id = ?
            LIMIT 1)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("diis",
        $total_price,
        $product_id,
        $quantity,
        $command_id
    );

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function updateUserProfilePic($conn, $profile_pic){
    $sql = "UPDATE USER
            SET profile_image = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s",
        $profile_pic
    );

    $stmt->execute();
}

function getUserInfo($conn, $user){
    $sql_user = "SELECT user_id, user_name, email, password, address, town,  postalCode, profile_image
                 FROM USER
                 WHERE email ='".$user."'";
    $result_user = $conn->query($sql_user);
    return $result_user->fetch_assoc();
}

function updateUser($conn){
    if($_POST['newName'] != ""){
        $sql = "UPDATE USER
                SET user_name = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s",
            $_POST['newName']
        );

        $stmt->execute();
    }
    if($_POST['newEmail'] != ""){
        $sql = "UPDATE USER
                SET email = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s",
            $_POST['newEmail']
        );

        $stmt->execute();
    }
    if($_POST['newAddress'] != ""){
        $sql = "UPDATE USER
                SET address = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s",
            $_POST['newAddress']
        );

        $stmt->execute();
    }
    if($_POST['newTown'] != ""){
        $sql = "UPDATE USER
                SET town = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s",
            $_POST['newTown']
        );

        $stmt->execute();
    }
    if($_POST['newPostalCode'] != ""){
        $sql = "UPDATE USER
                SET postalCode = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s",
            $_POST['newPostalCode']
        );

        $stmt->execute();
    }
}

function getCommandsForUser($conn, $user){
    $sql_commands = "SELECT C.command_id as command_id, C.created as command_date, C.import_total as totalAmount,
                     P.product_image as product_image, P.product_name as product, CL.quantity as quantity, CL.total_price as productPrice
                     FROM COMMAND C
                     INNER JOIN COMMAND_LINE CL ON C.command_id = CL.command_id
                     INNER JOIN PRODUCT P ON CL.product = P.product_id
                     WHERE C.user_command = (SELECT user_id FROM USER WHERE email ='".$user."')
                     ORDER BY C.command_id desc";
    $result_commands = $conn->query($sql_commands);
    return $result_commands;
}

/**
* @return bool validUser
* Checks if all the input fields from the main registering form are valid. If they are,
* returns true and calls the DDBB registering function
*/
function validateRegister(){
        $validUser = true;

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $town = $_POST["town"];
        $postalCode = $_POST["postalCode"];

        // Validate user 'name'
        if(preg_match('/^[a-zA-Z\s]*$/', (string)$name)){ // checks if '$name' matches the letters and spaces only pattern
            // echo "nombre de usuario correcto";
        }else{echo"<script>alert('The user name is not correct.');</script>";
            $validUser = false;}

        // Validate user 'email'
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // echo "the user name is correct"
        }else{echo"<script>alert('The email address is not correct');</script>";
            $validUser = false;}

        // Validate user 'password'
        if(ctype_alnum ((string) $password )){
            // echo "the password is correct"
        }else{echo"<script>alert('The password is not correct');</script>";
            $validUser = false;}

        // Validate user 'address'
        if((strlen((string) $address) < 31) &&  preg_match('/^[A-Za-z0-9- ]+$/', (string)$address)){
            // echo "the address is correct"
        }else{echo"<script>alert('The address is not correct');</script>";
            $validUser = false;}

        // Validate user 'town'
        if((strlen((string) $town) < 31) && ctype_alnum ((string) $town )){
            // echo "the town is correct"
        }else{echo"<script>alert('The town name is not correct');</script>";
            $validUser = false;}

        // Validate user 'postalCode'
        if(strlen((string) $postalCode) == 5 && preg_match('/^\d{4,5}$/', (string)$postalCode)){
            // echo "the postal code is correct"
        }else{echo"<script>alert('The postal code is not correct');</script>";
        $validUser = false;}

        return $validUser;
}

/**
* @return bool validUser
* Validates if the user who is trying to log in is already registered or not
*/
function validateUser($conn){
    $validUser = false;
    $db_password = "";
    $db_email = "";

    $sql = "SELECT email, password FROM USER WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]);

    if ($stmt->execute() === TRUE) {
        $stmt->bind_result($db_email, $db_password);
        while ($stmt->fetch()) {
            if($_POST["email"] == $db_email && password_verify($_POST["password"], $db_password)){
                $validUser = true;
            }
        }
    } else {
        return $validUser;
    }
    return $validUser;
}
