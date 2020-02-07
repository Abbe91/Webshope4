<?php

try {
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if($_POST["action"] == "add") { 
            include_once("./../handlers/productHandler.php");              
            echo json_encode(add(
                $_POST["description"],
                $_POST["quantity"],
                $_POST["unitPrice"],
                $_POST["discount"]
            ));
            exit;

        } else if($_POST["action"] == "deleteOneProduct") {
            include_once("./../handlers/productHandler.php");              
            echo json_encode(deleteOneProduct($_POST['productName']));
            exit;

        }else if($_POST["action"] == "deleteAllProduct") {
            include_once("./../handlers/productHandler.php");              
            echo json_encode(deleteAllProduct($_POST['removeAllProduct']));
            exit;

        }else {
            throw new Exception("Not a valid endpont", 501);
        }
    } else if($_SERVER["REQUEST_METHOD"] == "GET") {

        if($_GET["action"] == "getAll") { 
            include_once("./../handlers/productHandler.php");              
            echo json_encode(getAll());
            exit;
        }  
    } else {
         throw new Exception("Not a valid request method", 405);
    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}


?>