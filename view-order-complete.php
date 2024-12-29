<?php
    $title = 'Order Complete';

    include 'config/connect.php';
    include 'codes/authentication-code.php';
    include 'codes/payment-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    include_once 'controllers/PaymentController.php';
    
    $authenticated = new AuthenticateController;
    $payment = new PaymentController;

    $authenticated->customerOnly();
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    
    include 'message.php';

    $userData = $authenticated->userTable();
?>

<link rel="stylesheet" href="css/mycart.css?v1.5">

<style>
    /* .child-cart-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 1200px;
        background-color: transparent;
        padding: 30px;
    } */

    .continue-shopping-btn {
        display: inline-block;
        background-color: #111;
        color: #fff;
        padding: 12px 30px;
        font-size: 16px;
        text-decoration: none;
        margin-top: 20px;
        text-align: center;
    }

    .continue-shopping-btn:hover {
        opacity: .8;
    }

    .main-text-display {
        margin-bottom: 20px;
    }

    .text-cont {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .text-display {
        font-size: 16px;
        color: #777;
    }

    .text-selected {
        font-size: 16px;
        /* color: #4CAF50; */
        color: #111;
        font-weight: bold;
    }
</style>

<?php if(isset($_SESSION['authenticated'])) : ?>

    <?php if(!empty($userData['userFullname']) && !empty($userData['userNumber']) && !empty($userData['userAddress']) && !empty($userData['userGender'])) : ?>

<div class="main-cart-item-container" style="
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        flex-direction: column;
        text-align: center;
        padding: 0 20px;
    ">

    <?php
        if(!isset($_GET['success'])){

            redirect('Please select an item and complete payment', 'view-landing.php');
        }else{

            $orderID = $_GET['success'];

            $resultGetExactOrder = $payment->getExactOrder($orderID);

            while($orderData = $resultGetExactOrder->fetch_assoc()):
    ?>

    <div class="main-text-display" style="margin-top: 20px;">
        <div class="text-cont">
            <p class="text-display">Cart</p> >
            <p class="text-display">Place Order</p> >
            <p class="text-display">Pay</p> >
            <p class="text-selected">Order Complete</p>
        </div>
    </div>

    <div class="child-cart-container" style="
            /* border: 1px solid red; */
            display:flex;
            justify-content: center;
            flex-direction: column;
            align-items:center;
            width:100%;
            height: 100%;
            /* margin-bottom: 0px; */
        ">

        <div class="order-complete-section" style="
            /* border: 1px solid red; */
            display:flex;
            justify-content: center;
            flex-direction: column;
            align-items:center;
            width: 100%;
            height: 100%;
            gap: 5px;
            padding: 25px;
        ">
            <h2 style="color: #111; margin-bottom: 20px;">Thank You for Your Order!</h2>
            <p>Your order has been successfully placed. Please check your email.</p>
            <p>Official receipt has been sent to your email: <strong><?= $userData['userEmail'] ?></strong>.</p>

            <div class="actions">
                <a href="view-landing.php" class="continue-shopping-btn">Continue Shopping</a>
            </div>
        </div>

    </div>

</div>

    <?php
            endwhile;
        }
    ?>

    <?php endif; ?>

<?php endif; ?>

<script>
    function back(){
        window.location.href = 'view-cart.php';
    }
</script>

<?php
    // include 'includes/footer.php';
?>
