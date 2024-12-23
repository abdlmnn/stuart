<?php
    session_start();

    $conn = mysqli_connect('localhost','root','','stuartdb');

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