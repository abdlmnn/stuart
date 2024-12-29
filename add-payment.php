<?php
    $title = 'Payment GCash';

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
    // include 'includes/navbar.php';
    // include 'includes/cart.php';
    
    include 'message.php';

    $userData = $authenticated->userTable();

    // print_r($userData['userEmail']);
?>

<link rel="stylesheet" href="css/mycart.css?v9.8">

<?php if(isset($_SESSION['authenticated'])) : ?>

    <?php if(!empty($userData['userFullname']) && !empty($userData['userNumber']) && !empty($userData['userAddress']) && !empty($userData['userGender'])) : ?>

<div class="main-cart-item-container">

    <?php
        if(!isset($_GET['order'])){

            redirect('Please select item and checkout before payment','view-landing.php');
        }else{

            // print_r($_GET['order']);

            $orderID = $_GET['order'];

            $resultGetExactOrder = $payment->getExactOrder($orderID);

            while($orderData = $resultGetExactOrder->fetch_assoc()):
    ?>

    <div class="main-text-display" style="margin-top: 20px;">
        <div class="text-cont">
            <p class="text-display">Cart</p> >
            <p class="text-display">Place Order</p> >
            <p class="text-selected">Pay</p> >
            <p class="text-display">Order Complete</p>
        </div>
    </div>

    <div class="child-cart-container">

    <div class="payment-section">
        <div class="qr-code-container">
            <h3 style="margin-bottom: 15px; font-size: 20px;">Scan QR Code to Pay</h3>

            <img src="gcash/QRcode.jpg" alt="GCash QR Code" class="qr-code-image">
        </div>

        <form method="post" action="" enctype="multipart/form-data" class="form-payment-container">
            <h3>Upload Proof of Payment</h3>

            <label for="file-upload" class="custom-file-label">Choose File</label>

            <input type="hidden" name="orderID" value="<?= $orderID ?>">
            <input type="hidden" name="amount" value="<?= $orderData['orderAmount'] ?>">

            <input type="file" id="file-upload" name="inputProof" accept=".jpg, .jpeg, .png" required>

            <button type="submit" name="add-payment-button" class="upload-btn">Upload</button>
        </form>
    </div>

            <div class="order-details-section">
                <h3>Order Summary</h3>
                <div class="order-detail">
                    <strong>Pay To:</strong>
                    <p>Stuart Boutique</p>
                </div>
                <div class="order-detail">
                    <strong>Order Info:</strong>
                    <p><?= $orderData['userFullname'] ?></p>
                </div>
                <div class="order-detail">
                    <strong>Order ID:</strong>
                    <p>#<?= $orderData['orderID'] ?></p>
                </div>
                <div class="order-detail">
                    <strong>Order Amount:</strong>
                    <p>&#x20B1; <?= number_format($orderData['orderAmount']) ?></p>
                </div>
                <div class="order-detail">
                    <strong>Total to Pay:</strong>
                    <p class="total-to-pay">&#x20B1; <?= number_format($orderData['orderAmount']) ?></p>
                </div>
                <div class="order-detail" style="display: flex; flex-direction: column; gap: 10px; text-align: center;">
                    <a href="view-invoice.php?order=<?= $orderID ?>" class="back-button">Invoice</a>
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
