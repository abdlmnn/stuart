<?php
    $title = 'Receipt';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/payment-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    include_once 'controllers/PaymentController.php';
    
    $authenticated = new AuthenticateController;
    $payment = new PaymentController;

    // $authenticated->customerOnly();
    // $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    // include 'includes/navbar.php';
    // include 'includes/cart.php';
    
    include 'message.php';

    // $userData = $authenticated->userTable();

    // print_r($userData['userEmail']);
?>

<link rel="stylesheet" href="css/receipt.css?v=2.1">

        <?php
            if(!isset($_GET['order'])){

            redirect('Please select item and checkout before payment','view-landing.php');
            }else{

                // print_r($_GET['order']);

                $orderID = $_GET['order'];

                $resultGetExactOrder = $payment->getExactOrder($orderID);

                $orderData = $resultGetExactOrder->fetch_assoc();

                $formattedDate = date('F j, Y, g:i a', strtotime($orderData['orderDate']));
        ?>

        <?php if($orderData['orderStatus'] === 'approved' && $orderData['paymentStatus'] === 'paid') : ?>

<div class="main-receipt-container">
    <div class="receipt">
        <header class="receipt-header">
            <h1>Stuart Boutique</h1>
            <p>Torallba st. Poblacion Iligan City</p>
            <p>Email: contact@stuartboutique.com | Phone (063) 221 3543</p>
        </header>

        <section class="receipt-info">
            <div class="info-item">
                <strong>Receipt: </strong>
                <span># <?= $orderID ?></span>
            </div>
            <div class="info-item">
                <strong>Date: </strong>
                <span><?= $formattedDate ?></span>
            </div>
            <div class="info-item">
                <strong>Customer Name: </strong>
                <span><?= $orderData['userFullname'] ?></span>
            </div>
            <div class="info-item">
                <strong>Contact: </strong>
                <span><?= $orderData['userNumber'] ?></span>
            </div>
        </section>

        <section class="receipt-items">
            <h3>Order Details</h3>
            <table>
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
                <?php
                    $resultGet = $payment->getDataOrderline($orderID);

                    if($resultGet){
                        
                        while($data = $resultGet->fetch_assoc()){

                            $total = $data['orderlineTotal'];
                ?>
                    <tr>
                        <td><?= $data['itemName'] ?></td>
                        <td><?= $data['sizeName'] ?></td>
                        <td><?= $data['orderlineQuantity'] ?></td>
                        <td><?= $data['itemPrice'] ?></td>
                        <td><?= number_format($total) ?></td>
                    </tr>
                <?php
                        }
                    }
                ?>
                </tbody>
            </table>
        </section>

        <section class="receipt-total">

            <div class="total-line payment">
                <strong style="color: #111; font-size: 16px;">Payment:</strong>
                <span><?= $orderData['paymentMethod'] ?></span>
            </div>

            <div class="total-line total-due">
                <strong style="color: #111; font-size: 16px;">Total:</strong>
                <span>&#8369; <?= number_format($total) ?></span>
            </div>
            
        </section>

        <footer class="receipt-footer">
            <p>Thank you for your purchase!</p>
            <p>Visit us again at Stuart Boutique.</p>
        </footer>

    </div>

</div>
        <?php endif; ?>

        <?php 
            } 
        ?>

