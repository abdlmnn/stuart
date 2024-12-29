<?php
    $title = 'Invoice';

    include 'config/connect.php';
    include 'codes/authentication-code.php';
    include 'codes/payment-code.php';

    include_once 'controllers/AuthenticateController.php';
    include_once 'admin/controllers/InventoryController.php';
    include_once 'admin/controllers/SizesController.php';
    include_once 'controllers/PaymentController.php';
    $authenticated = new AuthenticateController;
    $inventory = new InventoryController;
    $sizes = new SizesController;
    $payment = new PaymentController;

    $authenticated->customerOnly();
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    // include 'includes/navbar.php';

    include 'message.php';

    $userData = $authenticated->userTable();
    $currentDate = date("F j, Y");
?>

<link rel="stylesheet" href="css/invoice.css?v4.5">

<?php if(isset($_SESSION['authenticated'])) : ?>

    <?php if(!empty($userData['userFullname']) && !empty($userData['userNumber']) && !empty($userData['userAddress']) && !empty($userData['userGender'])) : ?>

    <?php if(isset($_GET['orderID'])) : ?>

    <?php $orderID = $_GET['orderID']; ?>

    <?php
            $resultOrder = $payment->getExactOrder($orderID);

            if($resultOrder){

                $order = $resultOrder->fetch_assoc();

                $paymentMethod =$order['paymentMethod'];
        }
    ?>

<div class="invoice-container">
    
    <div class="invoice-header">
        <h1 class="invoice-title">Invoice</h1>
        <h3>Billing Address</h3>
        <p><strong>Date:</strong> <?= $currentDate ?></p>
        <p><strong>Customer:</strong> <?= $userData['userFullname'] ?></p>
        <p><strong>Email:</strong> <?= $userData['userEmail'] ?></p>
        <p><strong>Phone:</strong> <?= $userData['userNumber'] ?></p>
        <p><strong>Address:</strong> <?= $userData['userAddress'] ?></p>
    </div>

    <div class="invoice-items">
        <h3>Order Details</h3>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach($_SESSION['cart'] as $inventoryID => $inventoryData) : ?>
                    <?php foreach ($inventoryData['item'] as $size => $data) : ?>
                        <?php 
                            $sizeID = $data['size'];
                            $sizeRow = $sizes->getSizeName($sizeID);
                            $itemTotal = $data['price'] * $data['quantity'];
                            $total += $itemTotal;
                        ?>
                        <tr>
                            <td><?= $data['name']; ?></td>
                            <td><?= $sizeRow['sizeName']; ?></td>
                            <td><?= $data['quantity']; ?></td>
                            <td>&#x20B1; <?= number_format($data['price']); ?></td>
                            <td>&#x20B1; <?= number_format($itemTotal); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="invoice-summary">
        <h3>Order Summary</h3>
        <p><strong>Subtotal:</strong> &#x20B1; <?= number_format($total); ?></p>
        <?php
            $resultOrder = $payment->getExactOrder($orderID);

            if($resultOrder){

                $orderData = $resultOrder->fetch_assoc();
        ?>
            <p><strong>Payment Method:</strong> <?= $orderData['paymentMethod'] ; ?></p>

        <?php
            }
        ?>
    </div>

    <a href="add-payment.php?order=<?= $orderID ?>" class="alink">Back to Payment</a><br><br>
    <a href="view-landing.php" class="alink">Continue Shopping</a>
            <br><br>
            <form action="" method="post">
        <input type="hidden" name="userID" value="<?= $userData['userID'] ?>">
        <input type="hidden" name="orderID" value="<?= $orderID ?>">
        <input type="hidden" name="orderID" value="<?= $total ?>">

        <button type="submit" name="order-complete-button" >Complete Order</button>
    </form>
</div>

<?php endif; ?>

<?php endif; ?>



<?php endif; ?>
