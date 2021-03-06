<?php 
$dsn=mysqli_connect("localhost","root","root","pickbook");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="./js/logic.js"></script>
    <title>PickBook</title>
</head>

<body>
    <button onclick="showProductList();">Produkt Lista</button>
    <button onclick="showInsertSection();">Lägg till produkt</button>
    <button onclick="showOrderList();">Beställningar</button>


    <section id="insertProduct">
        <h1 align="center">Lägg till produkt</h1>
        Product Category:<input type="text" name="insertProductCategory">
        <select name="product_cat" required>
                    <option>Select the category you want</option>
                    <?php

                        $get_cat="select * from categories";
                        $run_cat=mysqli_query($dsn,$get_cat);
                        while($row_cat=mysqli_fetch_array($run_cat))
                        {
                            $cat_id=$row_cat['category_id'];
                            $cat_title=$row_cat['categoryName'];
                            echo"<option value='$cat_id'>$cat_title</option>";
                        }
                    ?>
                </select> Product Name: <input type="text" name="insertProductName"> Description: <input type="text" name="insertDescription"> Quantity: <input type="text" name="insertQuantity"> UnitPrice: <input type="text" name="insertUnitPrice">        Discount: <input type="text" name="insertDiscount"> Image: <input class="file" type="file" name="productImg" id="imageUploadInput">
        <hr>
        <input type="text" name="deleteOneProduct" placeholder="Skriv det produktens id nummer som du vill radera">
        <button onclick="deleteProduct();">Delete Product</button>
        <hr>
        <input class="file" onclick="deleteAllProduct()" type="button" name="removeAllProduct" value="Ta bort allt">
        <button onclick="insertProduct();">Add Product</button>
        <hr>
    </section>

    <section id="productList">
        <h1 align="center">Produkt Lista</h1>
        <table id="table">
            <tr>
                <th>Product id</th>
                <th>Product Category</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>UnitPrice</th>
                <th>Discount</th>
                <th>Image</th>
                <th>Edit</th>
            </tr>
        </table>
    </section>

    <section id="orderList">

        <h1 align="center">Beställningar</h1>

        <table id="orderTable">
            <tr>
                <th>orderId</th>
                <th>users_id</th>
                <th>orderDate</th>
                <th>shippingaddress</th>
                <th>wight</th>
                <th>total_price</th>
            </tr>
        </table>

    </section>


</body>

</html>