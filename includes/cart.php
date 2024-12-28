<?php if(isset($_SESSION['authenticated'])) : ?>
    
    <div class="cart-container" id="cartContainer">
        
        <div class="close-cart" id="cartClose" onclick="cartClose()">
            <ion-icon name="chevron-back-outline" class="close-icon"></ion-icon>
        </div>

        <h1 class="cart-title">
            <a href="view-cart.php" style="color: #111;">My Cart</a>
        </h1>

        <?php
            include_once 'controllers/CartController.php';
            include_once 'admin/controllers/SizesController.php';

            $cart = new CartController;
            $sizes = new SizesController;
        ?>

            <?php if(!empty($_SESSION['cart']) && isset($_SESSION['cart'])) : ?>

                <?php $total = 0; ?>

                <!-- first array cart, second array inventoryID then value -->
                <?php foreach ($_SESSION['cart'] as $inventoryID => $inventoryData): ?>

                    <!-- third array item, fourth array size then data inside of cart array -->
                    <?php foreach ($inventoryData['item'] as $size => $data) : ?>
                        
                        <?php 
                            $sizeID = $data['size'];

                                    // getSizeName came from my Class SizesController
                            $sizeRow = $sizes->getSizeName($sizeID);

                            $total = $total + $data['price'] * $data['quantity'];
                        ?>
                        
            <!-- <form action="" method="post"> -->

                <div class="cart-item-container">

                    <div class="each-cart">

                        <div class="cart-image-container">
                            <img src="images/<?= $data['image']; ?>" alt="" class="cart-image">
                        </div>

                        <div class="cart-description">
                            <h1 class="cart-item-name"><?= $data['name']; ?></h1>

                            <p class="cart-item-totalprice">&#x20B1; <?= number_format($data['price'] * $data['quantity']); ?></p>
                            
                            <p class="cart-item-size" style="margin-bottom: 5px;">Size : <?= $sizeRow['sizeName']; ?></p>

                            <form action="" method="post">
                            <div class="quantity-controls qtyBox">
                                
                                <!-- <input type="hidden" name="inputID" class="inventoryID" value="<?= $id ?>"> -->

                                <button type="button" class="quantity-button decrement">-</button>

                                <input type="number" name="inputQuantity" class="qty quantity-input" min="0" value="<?= $data['quantity']; ?>">

                                <button type="button" class="quantity-button increment">+</button>

                            </div>

                            <div class="cart-button-action">

                                <button type="submit" name="update-quantity-order-button" class="remove-button">
                                    <ion-icon name="bag-check-outline"></ion-icon>
                                </button>

                                
                                <input type="hidden" name="inventoryID" class="inventoryID" value="<?= $data['id'] ?>">
                                <input type="hidden" name="sizeID" class="inventoryID" value="<?= $data['size'] ?>">

                                <button type="submit" name="delete-order-button" class="remove-button">
                                    <!-- <ion-icon name="close-outline" class="remove-cart-icon"></ion-icon> -->
                                    <ion-icon name="bag-remove-outline"></ion-icon>
                                </button>

                            </div>
                            </form>
                            
                        </div>

                    </div>

                </div>

                        <?php endforeach; ?>

                    <?php endforeach; ?>
            
            <div class="cart-checkout-container">

                <div class="total-price-container">
                    <p class="total-price-display">Total : <span id="total-Price">&#x20B1; <?= number_format($total) ?></span></p>

                    <?php $totalQuantity = 0; ?>

                    <!-- first array cart, second array inventoryID then value -->
                    <?php foreach ($_SESSION['cart'] as $inventoryID => $inventoryData): ?>

                        <!-- third array item, fourth array size then data inside of cart array -->
                        <?php foreach ($inventoryData['item'] as $size => $data) : ?>

                            <?php $totalQuantity = $totalQuantity + $data['quantity']; ?>

                        <?php endforeach; ?>

                    <?php endforeach; ?>

                    <button type="button" class="remove-button-two" onclick="viewCart()">VIEW CART (<?= $totalQuantity ?>)</button>
                    
                    <!-- <button type="submit" name="delete-all-order-button" class="remove-button-two">Clear All</button> -->
                </div>

                <!-- <button type="button" class="remove-button-two">View Order ()</button> -->

                <form action="" method="post">
                    <input type="hidden" name="inventoryID" class="inventoryID" value="<?= $data['id'] ?>">
                    <input type="hidden" name="sizeID" class="inventoryID" value="<?= $data['size'] ?>">
                    <button type="submit" name="delete-all-order-button" class="remove-button-two">CLEAR ALL</button>
                </form>
            </div>
        
        <!-- </form> -->

        <?php endif; ?>

        <!-- if the session order array is empty -->
        <?php if(empty($_SESSION['cart'])) : ?>
            <p 
            style="
                /* border: 1px solid red; */
                margin: 200px auto;
                opacity: 0.5;
                font-size: 1rem;
            ">
                Empty Cart
            </p>
       
        <?php endif; ?>

    </div>

    <script>
        function viewCart(){
            window.location.href = 'view-cart.php';
        }
    </script>

<?php endif; ?>