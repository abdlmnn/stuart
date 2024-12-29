<?php
    session_start();

    $conn = mysqli_connect('localhost','root','','stuartdb');

    // MODAL VIEW ORDER
    if (isset($_POST['view-order-button'])) {
        $orderID = $_POST['id'];
    
        $getDataQuery = "
            SELECT orderline.*, orders.*, inventory.*, sizes.*
            FROM orderline
            INNER JOIN orders ON orderline.orderID = orders.orderID
            INNER JOIN inventory ON orderline.inventoryID = inventory.inventoryID
            INNER JOIN sizes ON orderline.sizeID = sizes.sizeID
            WHERE orderline.orderID='$orderID'
        ";
    
        $result = mysqli_query($conn, $getDataQuery);
    
        if ($result->num_rows > 0) {

            $grandTotal = 0;

            $response = "";
    
            while ($row = $result->fetch_assoc()) {

                $inventoryID = $row['inventoryID'];
                $itemName = $row['itemName'];
                $itemImage = $row['itemImage'];
                $sizeID = $row['sizeID'];
                $sizeName = $row['sizeName'];
                $price = $row['itemPrice'];
                $quantity = $row['orderlineQuantity'];

                $total = $price * $quantity;
    
                $grandTotal = $grandTotal + $total;
    
                $response .= "
                    <div class='order-item'>
                        <img src='images/$itemImage' alt='$itemName'>
                        <div class='item-details'>
                            <p><strong>Name:</strong> $itemName</p>
                            <p><strong>Size:</strong> $sizeName </p>
                            <p><strong>Price:</strong> &#x20B1; " . number_format($price) . "</p>
                            <p><strong>Quantity:</strong> $quantity</p>
                            <p><strong>Total:</strong> &#x20B1; " . number_format($total) . "</p>
                        </div>
                    </div>
                ";
            }
    
            $ordersQuery = "
                SELECT orders.*, users.*
                FROM orders
                INNER JOIN users ON orders.userID = users.userID
                WHERE orders.orderID='$orderID'
            ";
    
            $resultOrders = mysqli_query($conn, $ordersQuery);
    
            if ($resultOrders->num_rows > 0) {

                $orderData = $resultOrders->fetch_assoc();

                $fullname = $orderData['userFullname'];

                $paymentMethod = $orderData['paymentMethod'];
    
                // Add user info and grand total to the response
                $response = "
                    <h2>Order Receipt</h2>
    
                    <div class='user-info'>
                            <p><strong>Full Name:</strong> $fullname</p>
                            <p><strong>Payment Method:</strong> $paymentMethod</p>
                    </div>
    
                    <div class='order-items'>
                        $response
                    </div>

                    <div class='total-amount'>
                        <p><strong>Order Total:</strong> &#x20B1; " . number_format($grandTotal) . "</p>
                    </div>
                    
                ";
            }
    
            echo $response;
        }
    }
    
    // MODAL VIEW ORDER
    // MODAL VIEW
    if(isset($_POST['click_view_bttn']))
    {
        $id = $_POST['id'];

        // echo $id;

        $getDataQuery = "
            SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
            FROM inventory
            INNER JOIN subcategories 
            ON inventory.subcategoryID = subcategories.subcategoryID
            INNER JOIN categories 
            ON subcategories.categoryID = categories.categoryID
            WHERE inventoryID='$id'
        ";
        $result = mysqli_query($conn,$getDataQuery);

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){

                $image = $row['itemImage']; 
                $categoryName = $row['categoryName'];
                $subcategoryName = $row['subcategoryName'];
                $itemName = $row['itemName']; 
                $itemQuantity = $row['itemTotalStock'];
                $itemPrice = number_format($row['itemPrice']);


                $sizesQuery = "
                    SELECT sizeID, sizeName, sizeStock
                    FROM sizes
                    WHERE inventoryID='$id'
                ";
                $sizesResult = mysqli_query($conn, $sizesQuery);

                if($sizesResult->num_rows > 0){

                    $response = "

                    <div class='item-image-container'>
                        <div class='child-image-container'>
                            <img src='images/$image' alt='' class='item-images'>
                        </div>
                    </div>

                    <div class='item-info-container'>

                        <h5 class='item-category'>$categoryName / $subcategoryName</h5>
                        <p class='item-name'>$itemName</p>
                        <p class='item-quantity'>$itemQuantity item left</p>

                        <div class='item-price-container'>
                            <span class='item-price'>&#x20B1; $itemPrice</span>
                        </div>

                        <div class='item-size-container'>
                            <h6 class='item-size-name'>Size</h6>

                            <div class='size-option-container'>"
                    ;

                            while($sizeRows = $sizesResult->fetch_assoc()){

                                $sizeID = $sizeRows['sizeID'];
                                $sizeName = $sizeRows['sizeName'];
                                $sizeStock = $sizeRows['sizeStock'];

                                $response .= "
                                    <label class='size-option'>
                                        <input type='radio' name='inputSize' value='$sizeID' required>
                                        <span class='size-content'>
                                            $sizeName
                                            <span class='stock-quantity'>($sizeStock)</span>
                                        </span>
                                    </label>";
                            }

                    $response .= "

                            </div>

                        </div>
    
                        <div class='item-quantity-container'>

                            <h6 class='item-quantity-name'>Qty:</h6>

                            <div class='quantity-selector qtyBox'>
                                <input type='hidden' name='inputID' class='inventoryID' value='$id'>
    
                                <button type='button' class='quantity-button decrement'>-</button>
    
                                <input type='number' name='inputQuantity' class='qty quantity-input' value='1' min='1' max='$itemQuantity'>
    
                                <button type='button' class='quantity-button increment'>+</button>
                            </div>

                        </div>
    
                        <div class='add-cart-container'>

                            <button type='submit' name='add-order-button' value='$id' class='add-to-cart-button'>
                                ADD TO CART
                            </button>
                            
                        </div>

                    </div>
                    ";

                    echo $response;
                }

            }

        }

    }
    // MODAL VIEW

?>