<?php
    $title = 'My Cart';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/cart-code.php';
    include 'codes/payment-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    include_once 'admin/controllers/InventoryController.php';
    include_once 'admin/controllers/SizesController.php';
    $authenticated = new AuthenticateController;
    $inventory = new InventoryController;
    $sizes = new SizesController;

    $authenticated->customerOnly();
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';
    // include 'includes/cart.php';
    
    include 'message.php';

    $userData = $authenticated->userTable();
?>

<link rel="stylesheet" href="css/mycart.css?v2.5">

<?php if(isset($_SESSION['authenticated'])) : ?>

    <?php if(!empty($userData['userFullname']) && !empty($userData['userNumber']) && !empty($userData['userAddress']) && !empty($userData['userGender'])) : ?>

    <?php if(!empty($_SESSION['cart']) && isset($_SESSION['cart'])) : ?>

<div class="main-cart-item-container">
    
    <div class="main-text-display">
        <div class="text-cont">
            <p class="text-display">Cart</p> >
            <p class="text-selected">Place Order</p> >
            <p class="text-display">Pay</p> >
            <p class="text-display">Order Complete</p>
        </div>
    </div>

    <div class="child-cart-container">

        <div class="another-child-cart-container">
        <div class="billing-address-container">
            <h2 class="billing-address-title">Customer Information</h2>
            <?php 
                $userData = $authenticate->userTable();
            ?>
            <form action="" method="post" class="billing-form">
                <div class="form-group">
                    <label for="fullname">Fullname:</label>
                    <input type="text" name="fullname" value="<?= $userData['userFullname'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" value="<?= $userData['userNumber'] ?>" name="phone" disabled>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" value="<?= $userData['userAddress'] ?>" name="address" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" value="<?= $userData['userEmail'] ?>" name="email" disabled>
                </div>
            </form>
        </div>

        <div class="cart-info-container">

            <section class="item-button">

                <h2 class="all-items">Order Details</h2>

            </section>

        <!-- first array cart, second array inventoryID then value -->
        <?php foreach($_SESSION['cart'] as $inventoryID => $inventoryData) : ?>

            <!-- third array item, fourth array size then data inside of cart array -->
            <?php foreach ($inventoryData['item'] as $size => $data) : ?>

                <?php 
                    $sizeID = $data['size'];

                    // print_r($size);
                    // print_r($inventoryID);

                             // getSizeName came from my Class SizesController
                    $sizeRow = $sizes->getSizeName($sizeID);
                ?>
                
                <div class="cart-items">

                    <img src="images/<?= $data['image']; ?>" alt="<?= $data['name']; ?>">

                    <div class="cart-items-info">
                        <h4 class="cart-item-name"><?= $data['name']; ?></h4>
                        
                        <p class="cart-item-price">&#x20B1; <?= number_format($data['price'] * $data['quantity']); ?></p>

                    <p class="cart-item-size">size: <?= $sizeRow['sizeName']; ?></p>

                    <div class="item-quantity-container">
                        <h6 class="item-quantity-name">Qty:</h6>

                        <Strong style="color: #E2A500;"><?= $data['quantity']; ?></Strong>

                            
                    </div>

                </div>

            </div>

            <?php endforeach; ?>
            
        <?php endforeach; ?>

        </div>
        </div>

        <div class="order-cash-container" style="margin-bottom: 0;">

            <div class="order-summary-container">
                <h3 class="order-summary">Order Summary</h3>

                <?php $total = 0; ?>

                <?php foreach($_SESSION['cart'] as $inventoryID => $inventoryData) : ?>

                    <?php foreach($inventoryData['item'] as $size => $data) : ?>

                        <?php 
                            $sizeID = $data['size'];

                                    // getSizeName came from my Class SizesController
                            $sizeRow = $sizes->getSizeName($sizeID);

                            $total = $total + $data['price'] * $data['quantity'];
                        ?>

                        <div class="order-summary-item">
                            <h3 style="font-weight: 100;"><?= $data['name'] ?></h3>
                            <p style="font-weight: 100;">
                                <?= $sizeRow['sizeName'] ?> 
                                x 
                                <?= $data['quantity'] ?>
                            </p>
                        </div>

                    <?php endforeach; ?>
            
                <?php endforeach; ?>

                <hr>

                <div class="checkout-container">
                    <span class="estimated-price"><strong>Order Total:</strong></span>

                    <span class="subtotal-price"><strong>&#x20B1; <?= number_format($total) ?></strong></span>
                </div>

                <form action="" method="post">
                    <?php $totalQuantity = 0; ?>

                    <!-- first array cart, second array inventoryID then value -->
                    <?php foreach ($_SESSION['cart'] as $inventoryID => $inventoryData): ?>

                        <!-- third array item, fourth array size then data inside of cart array -->
                        <?php foreach ($inventoryData['item'] as $size => $data) : ?>

                            <?php $totalQuantity = $totalQuantity + $data['quantity']; ?>

                        <?php endforeach; ?>

                    <?php endforeach; ?>

                    <div class="checkout-btn-container" style="display: flex; flex-direction: column; gap: 10px; width: 100%;">

                        <button type="submit" name="add-place-order-button" class="checkout-btn">PLACE ORDER</button>

                        <input type="hidden" name="userID" value="<?= $userData['userID'] ?>">
                        <!-- <input type="hidden" name="inventoryID" value="<?= $data['id'] ?>"> -->
                        <!-- <input type="hidden" name="sizeID" value="<?= $size ?>"> -->
                        <input type="hidden" name="orderTotal" value="<?= $total ?>">

                        <button type="button" onclick="backtocart()" class="checkout-btn">BACK TO CART</button>
                        
                    </div>
                
            </div>

            <div class="cash-summary-container">
                <h3 class="cash-summary">Payment Method</h3>

                <div class="main-cash-container">
                    <div class="payment-option">
                        <input type="radio" name="paymentMethod" value="COD" required>
                        <label for="cod">
                            <img src="gcash/cod.png" alt="COD">
                        </label>
                    </div>

                    <div class="payment-option">
                        <input type="radio" name="paymentMethod" value="GCash" required>
                        <label for="gcash">
                            <img src="gcash/gcash.png" alt="GCash">
                        </label>
                    </div>
                </div>
                
            </div>

            </form>

        </div>

    </div>

</div>
    <?php endif; ?>

    <?php endif; ?>

<?php endif; ?>

<script>
    function backtocart(){
        window.location.href = 'view-cart.php';
    }
</script>
<?php
    include 'includes/footer.php';
?>