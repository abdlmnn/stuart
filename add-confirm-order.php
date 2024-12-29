<?php
    $title = 'Confirm Order';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/payment-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    include_once 'controllers/PaymentController.php';
    $authenticated = new AuthenticateController;
    $payment = new PaymentController;

    include 'includes/header.php';
    
    include 'message.php';
?>

<link rel="stylesheet" href="css/mycart.css?v8.5">

<?php
    if(!isset($_GET['orderID'])){

        // print_r($_GET['orderID']);
        showMessage('No order ID found');
    }else{
        $orderID = $_GET['orderID'];
    
?>
<div class="main-cart-item-container">
    
    <div class="main-text-display">
        <div class="text-cont">
            > <p class="text-selected">Confirmation Order</p> <
        </div>
    </div>

    <div class="child-cart-container">

        <div class="another-child-cart-container">

            <div class="billing-address-container">
                <h2 class="billing-address-title">Customer Information</h2>
                <?php 
                    $orderData = $payment->getExactOrder($orderID);

                    if($orderData){

                        while($order = $orderData->fetch_assoc()){

                ?>
                <form action="" method="post" class="billing-form">
                    <div class="form-group">
                        <label for="fullname">Fullname:</label>
                        <input type="text" name="fullname" value="<?= $order['userFullname'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" value="<?= $order['userNumber'] ?>" name="phone" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" value="<?= $order['userAddress'] ?>" name="address" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Email:</label>
                        <input type="text" value="<?= $order['userEmail'] ?>" name="email" disabled>
                    </div>
                </form>
                <?php
                        }
                    }
                ?>
            </div>

            <div class="cart-info-container">

                <section class="item-button">

                    <h2 class="all-items">Order Summary</h2>

                </section>
                        
                <?php
                    $resultOL = $payment->getDataOrderline($orderID);

                    if($resultOL){

                        while($data = $resultOL->fetch_assoc()){

                        $total = $data['orderlineTotal'];
                ?>
                    
                    <div class="cart-items">

                        <img src="images/<?= $data['itemImage'] ?>" alt="<?= $data['itemName'] ?>">

                        <div class="cart-items-info">
                            <h4 class="cart-item-name"><?= $data['itemName'] ?></h4>
                            
                            <p class="cart-item-price">&#x20B1; <?= number_format($data['itemPrice']) ?> </p>

                        <p class="cart-item-size">size: <?= $data['sizeName'] ?></p>

                        <div class="item-quantity-container">
                            <h6 class="item-quantity-name">Qty:</h6>

                            <Strong style="color: #E2A500;"><?= number_format($data['orderlineQuantity']) ?></Strong>
                        </div>

                    </div>


                </div>
                
                <?php
                        }
                    }
                ?>
            </div>
        </div>

        <div class="order-cash-container">

            <div class="order-summary-container">
                <h3 class="order-summary">Confirm Order #<?= $orderID ?></h3>

                <hr>

                <div class="checkout-container">
                    <span class="estimated-price"><strong>Order Total:</strong></span>

                    <span class="subtotal-price"><strong>&#x20B1; <?= number_format($total) ?></strong></span>
                </div>

                <form action="" method="post">
                    
                    <div class="checkout-btn-container" style="display: flex; flex-direction: column; gap: 10px; width: 100%;">

                        <button type="submit" name="approve-order-button" class="checkout-btn">APPROVE ORDER</button>

                        <input type="hidden" name="orderID" value="<?= $orderID ?>">

                        <button type="submit" name="cancel-order-button" class="checkout-btn">CANCEL ORDER</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php
    }
?>