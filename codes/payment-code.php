<?php
    require_once 'phpmailer/src/PHPMailer.php';
    require_once 'phpmailer/src/SMTP.php';
    require_once 'phpmailer/src/Exception.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    include_once 'admin/controllers/InventoryController.php';
    include_once 'admin/controllers/SizesController.php';
    include_once 'controllers/CartController.php';
    include_once 'controllers/PaymentController.php';

    $inventory = new InventoryController;
    $sizes = new SizesController;
    $cart = new CartController;
    $payment = new PaymentController;

    // CANCELLED ORDER
    if(isset($_POST['cancel-order-button']))
    {
        $orderID = $_POST['orderID'];

        $resultGetData = $payment->getExactOrder($orderID);

        if($resultGetData){

            $userData = $resultGetData->fetch_assoc();

            $resultCancel = $payment->cancelledOrder($orderID);

            if($resultCancel){

                // $paymentStatus = $userData['paymentStatus'];
                
                    // if($paymentStatus == 'unpaid'){

                        // $payment->updatePaymentStatus($orderID);
                    
                        $mail = new PHPMailer(true);

                        // Send email to the exact userEmail with a receipt and success payment and admin received notif order
                        try{

                            $email = $userData['userEmail'];
                            $fullname = $userData['userFullname'];
                            $total = $userData['orderAmount'];

                            $totalAmount = number_format($total);

                            //Server settings
                            $mail->SMTPDebug = 0;                           // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
                            $mail->isSMTP();                                // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                         // Enable SMTP authentication
                            $mail->Username = 'legendsalih24@gmail.com';    // SMTP username
                            $mail->Password = 'vuuf yosu qkzr xsih';        // SMTP password
                            // $mail->SMTPSecure = 'tls';                   // Enable TLS encryption, `ssl` also accepted
                            $mail->SMTPSecure = 'ssl';                      // Enable TLS encryption, `ssl` also accepted
                            // $mail->Port = 587;   // for tls              // TCP port to connect to
                            $mail->Port = 465;

                            //Recipients
                            $mail->setFrom(
                                    'legendsalih24@gmail.com', 
                                    'Stuart Boutique'
                                );                                          // from who? 

                            // For customer side
                            $mail->addAddress($email);   
                            
                            $mail->isHTML(true); 
                            $mail->Subject = "Order #$orderID Cancelled";
                            $mail->Body = "
                                <h2 style='color: #111;'>Your Order #$orderID has been cancelled</h2>
                                <p style='font-size: 16px; color: #111;'><strong>Amount:</strong> &#x20B1; $totalAmount</p>
                                <p style='font-size: 16px; color: #111;'>To inform you that your order has been cancelled.</p>
                                <p style='font-size: 16px; color: #111;'>If you believe this was a mistake, please contact us.</p>
                                <p style='font-size: 16px; color: #111;'>Thank you for your understanding.</p>
                            ";

                            // to solve a problem 
                            $mail->SMTPOptions = array(
                                'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                                )
                            );

                            $mail->send();

                            showMessage("Order #$orderID has been cancelled");

                            // unset($code);

                        }catch (Exception $e){

                            // Catch PHPMailer exceptions and display error
                            redirect('Email could not be sent. Error:'. $mail->ErrorInfo,"add-confirm-order.php?orderID=$orderID");
                        }

            }else{

                showMessage('Something went wrong approving order');
            }

        }else{

            showMessage('Something went wrong');
        }
    }
    // }
    // CANCELLED ORDER
    // APPROVED ORDER
    if(isset($_POST['approve-order-button']))
    {
        $orderID = $_POST['orderID'];

        // print_r($orderID);

        $resultGetData = $payment->getExactOrder($orderID);

        if($resultGetData){

            $userData = $resultGetData->fetch_assoc();

            $resultApprove = $payment->approvedOrder($orderID);

            if($resultApprove){

                $paymentStatus = $userData['paymentStatus'];
                
                    if($paymentStatus == 'unpaid'){

                        $payment->updatePaymentStatus1($orderID);
                    }

                        $mail = new PHPMailer(true);

                        // Send email to the exact userEmail with a receipt and success payment and admin received notif order
                        try{

                            $email = $userData['userEmail'];
                            $fullname = $userData['userFullname'];
                            $total = $userData['orderAmount'];

                            $totalAmount = number_format($total);

                            //Server settings
                            $mail->SMTPDebug = 0;                           // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
                            $mail->isSMTP();                                // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                         // Enable SMTP authentication
                            $mail->Username = 'legendsalih24@gmail.com';    // SMTP username
                            $mail->Password = 'vuuf yosu qkzr xsih';        // SMTP password
                            // $mail->SMTPSecure = 'tls';                   // Enable TLS encryption, `ssl` also accepted
                            $mail->SMTPSecure = 'ssl';                      // Enable TLS encryption, `ssl` also accepted
                            // $mail->Port = 587;   // for tls              // TCP port to connect to
                            $mail->Port = 465;

                            //Recipients
                            $mail->setFrom(
                                    'legendsalih24@gmail.com', 
                                    'Stuart Boutique'
                                );                                          // from who? 

                            // For customer side
                            $mail->addAddress($email);   
                            
                            $mail->isHTML(true); 
                            $mail->Subject = "Order #$orderID Confirmed";
                            $mail->Body = "
                                <h2 style='color: #111;'>Your Order #$orderID has been confirmed</h2>
                                <a href='http://localhost/stuart/view-receipt.php?order=$orderID' 
                                                style='background-color:rgb(22, 25, 22); 
                                                color: white; 
                                                padding: 10px 20px; 
                                                text-decoration: none; 
                                                font-size:16px;
                                                '>
                                                        Receipt
                                                </a>
                                <p style='font-size: 16px; color: #111;'><strong>Amount:</strong> &#x20B1; $totalAmount</p>
                                <p style='font-size: 16px; color: #111;'>Thank you, $fullname, for your purchase.</p>
                            ";

                            // to solve a problem 
                            $mail->SMTPOptions = array(
                                'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                                )
                            );

                            $mail->send();

                            showMessage("Order #$orderID has been confirmed");

                            // unset($code);

                        }catch (Exception $e){

                            // Catch PHPMailer exceptions and display error
                            redirect('Email could not be sent. Error:'. $mail->ErrorInfo,"add-confirm-order.php?orderID=$orderID");
                        }

            }else{

                showMessage('Something went wrong approving order');
            }

        }else{

            showMessage('Something went wrong');
        }

    }
    // APPROVED ORDER
    // the user is need to login to place an order
    if(isset($_SESSION['authenticated'])) :

        // Cash payment only 
        if(isset($_POST['add-complete-order-button']))
        {
            $orderID = $_POST['orderID'];
            $amount = $_POST['amount'];

            // Clear my cart into empty after successfull place order
            $cart->emptyCart();

            $mail = new PHPMailer(true);

                // Send email to the exact userEmail with a receipt and success payment and admin received notif order
                try{

                    $myEmail = 'legendsalih24@gmail.com';

                    $userEmail = $_SESSION['user']['email'];
                    $userFullname = $_SESSION['user']['fullname'];
                    $userNumber = $_SESSION['user']['number'];

                    $totalAmount = number_format($amount);
                    // $userFullname = $userData['userFullname'];

                    //Server settings
                    $mail->SMTPDebug = 0;                           // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
                    $mail->isSMTP();                                // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                         // Enable SMTP authentication
                    $mail->Username = 'legendsalih24@gmail.com';    // SMTP username
                    $mail->Password = 'vuuf yosu qkzr xsih';        // SMTP password
                    // $mail->SMTPSecure = 'tls';                   // Enable TLS encryption, `ssl` also accepted
                    $mail->SMTPSecure = 'ssl';                      // Enable TLS encryption, `ssl` also accepted
                    // $mail->Port = 587;   // for tls              // TCP port to connect to
                    $mail->Port = 465;

                    //Recipients
                    $mail->setFrom(
                            'legendsalih24@gmail.com', 
                            'Stuart Boutique'
                        );                                          // from who? 
                    
                    // For admin side 
                    $mail->addAddress($myEmail);         // Add a recipient

                    //Content
                    $mail->isHTML(true);                    // Set email format to HTML
                    $mail->Subject = "New Payment Received for Order #$orderID";
                    $mail->Body    = "
                                        <h2 style=' color: #111;
                                                  '
                                        >
                                                    New Payment Received
                                        </h2>

                                        <a href='http://localhost/stuart/add-confirm-order.php?orderID=$orderID' 
                                                style='
                                                background-color: #111;
                                                color: #fff ; 
                                                padding: 10px 20px; 
                                                text-decoration: none; 
                                                font-size:16px;
                                                '>
                                                                     Confirm Order
                                                </a>

                                        <p style=' color: #111; 
                                                    font-size: 16px;
                                                  '
                                        >
                                                    <strong>Name:</strong> $userFullname
                                        </p>

                                        <p style=' color: #111; 
                                                    font-size: 16px;
                                                  '
                                        >
                                                    <strong>Number:</strong> $userNumber
                                        </p>

                                        <p style='  color: #111;  font-size: 16px;
                                                 '
                                        > 
                                                    <strong>Order ID:</strong> $orderID
                                        </p>

                                        <p style='  color: #111;  font-size: 16px;
                                                 '
                                        > 
                                                    <strong>Amount:</strong> &#x20B1; $totalAmount
                                        </p>

                                        <p style='  color: #111;  font-size: 16px;
                                                 '
                                        > 
                                                    <strong>Payment Method:</strong> Cash
                                        </p>
                                     ";

                    $mail->send();
                    $mail->clearAddresses();    // clear recipient for next Email 

                    // For customer side
                    $mail->addAddress($userEmail);      
                    $mail->Subject = "Payment for Order #$orderID";
                    $mail->Body = "
                        <h1 style='color: #111;'>Payment Successful</h1>
                        <a href='http://localhost/stuart/view-invoice.php?order=$orderID' 
                                                style='background-color:rgb(22, 25, 22); 
                                                color: white; 
                                                padding: 10px 20px; 
                                                text-decoration: none; 
                                                font-size:16px;
                                                '>
                                                        Invoice
                                                </a>
                        <h2>Thank you for your payment for Order #$orderID</h2>
                        <p style='font-size: 16px;'><strong>Amount</strong>: &#x20B1; $totalAmount</p>
                        <p style='font-size: 16px;'>We appreciate your order! Once it’s approved, 
                        we’ll send you a notification email.</p>
                    ";

                    // to solve a problem 
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        )
                    );

                    $mail->send();

                    direct("view-order-complete.php?success=$orderID");

                    // unset($code);

                }catch (Exception $e){

                    // Catch PHPMailer exceptions and display error
                    redirect('Email could not be sent. Error:'. $mail->ErrorInfo,"view-invoice.php?order=$orderID");
                }

        }
        // Cash payment only
        // ADD payment for GCash
        if(isset($_POST['add-payment-button']))
        {
            $orderID = $_POST['orderID'];
            $amount = $_POST['amount'];
            $proofPayment = $_FILES['inputProof']['name'];
            $proofPaymentTemporary = $_FILES['inputProof']['tmp_name'];

                        // imagePath came from my Class PaymentController
            $resultPath = $payment->imagePath($proofPayment);

            if($resultPath){
                
                // addPayment came from my Class PaymentController
                $payment->addPayment($orderID,$amount,$proofPayment);

                // Clear my cart into empty after successfull Payment
                $cart->emptyCart();

                $mail = new PHPMailer(true);

                // Send email to the exact userEmail with a receipt and success payment and admin received notif order
                try{

                    $myEmail = 'legendsalih24@gmail.com';

                    $userEmail = $_SESSION['user']['email'];
                    $userFullname = $_SESSION['user']['fullname'];
                    $userNumber = $_SESSION['user']['number'];

                    $totalAmount = number_format($amount);
                    // $userFullname = $userData['userFullname'];

                    //Server settings
                    $mail->SMTPDebug = 0;                           // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
                    $mail->isSMTP();                                // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                         // Enable SMTP authentication
                    $mail->Username = 'legendsalih24@gmail.com';    // SMTP username
                    $mail->Password = 'vuuf yosu qkzr xsih';        // SMTP password
                    // $mail->SMTPSecure = 'tls';                   // Enable TLS encryption, `ssl` also accepted
                    $mail->SMTPSecure = 'ssl';                      // Enable TLS encryption, `ssl` also accepted
                    // $mail->Port = 587;   // for tls              // TCP port to connect to
                    $mail->Port = 465;

                    //Recipients
                    $mail->setFrom(
                            'legendsalih24@gmail.com', 
                            'Stuart Boutique'
                        );                                          // from who? 
                    
                    // For admin side 
                    $mail->addAddress($myEmail);         // Add a recipient

                    //Content
                    $mail->isHTML(true);                    // Set email format to HTML
                    $mail->Subject = "New Payment Received for Order #$orderID";
                    $mail->Body    = "
                                        <h2 style=' color: #111;
                                                  '
                                        >
                                                    New Payment Received
                                        </h2>

                                        <a href='http://localhost/stuart/add-confirm-order.php?orderID=$orderID' 
                                                style='background-color:rgb(22, 25, 22); 
                                                color: white; 
                                                padding: 10px 20px; 
                                                text-decoration: none; 
                                                font-size:16px;
                                                '>
                                                                     Confirm Order
                                                </a>

                                        <p style=' color: #111; 
                                                    font-size: 16px;
                                                  '
                                        >
                                                    <strong>Name:</strong> $userFullname
                                        </p>

                                        <p style=' color: #111; 
                                                    font-size: 16px;
                                                  '
                                        >
                                                    <strong>Number:</strong> $userNumber
                                        </p>

                                        <p style='  color: #111;  font-size: 16px;
                                                 '
                                        > 
                                                    <strong>Order ID:</strong> $orderID
                                        </p>

                                        <p style='  color: #111;  font-size: 16px;
                                                 '
                                        > 
                                                    <strong>Amount:</strong> &#x20B1; $totalAmount
                                        </p>

                                        <p style='  color: #111;  font-size: 16px;
                                                 '
                                        > 
                                                    <strong>Payment Method:</strong> GCash
                                        </p>

                                        <p style='  color: #111; font-size: 16px;
                                                 '
                                        > 
                                                    <strong>Proof of Payment</strong>
                                        </p>
                                        
                                     ";

                    if(is_uploaded_file($proofPaymentTemporary)){

                        // send the proof payment
                        $mail->addAttachment($proofPaymentTemporary,$proofPayment);
                    }

                    $mail->send();
                    $mail->clearAddresses();    // clear recipient for next Email 

                    // For customer side
                    $mail->addAddress($userEmail);      
                    $mail->Subject = "Payment for Order #$orderID";
                    $mail->Body = "
                        <h1 style='color: #111;'>Payment Successful</h1>
                        <a href='http://localhost/stuart/view-invoice.php?order=$orderID' 
                                                style='background-color:rgb(22, 25, 22); 
                                                color: white; 
                                                padding: 10px 20px; 
                                                text-decoration: none; 
                                                font-size:16px;
                                                '>
                                                        Invoice
                                                </a>
                        <h2>Thank you for your payment for Order #$orderID</h2>
                        <p style='font-size: 16px;'><strong>Amount</strong>: &#x20B1; $totalAmount</p>
                        <p style='font-size: 16px;'>We appreciate your order! Once it’s approved, 
                        we’ll send you a notification email.</p>
                    ";

                    // to solve a problem 
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        )
                    );

                    $mail->send();

                    direct("view-order-complete.php?success=$orderID");

                    // unset($code);

                }catch (Exception $e){

                    // Catch PHPMailer exceptions and display error
                    redirect('Email could not be sent. Error:'. $mail->ErrorInfo,"add-payment.php?order=$orderID");
                }

            }else{

                showMessage('Something went wrong with the image');
            }

        }
        // ADD payment for GCash
        // ADD PLACE ORDER and Payment for COD
        if(isset($_POST['add-place-order-button']))
        {
            $orderData = [
                'userID' => $_POST['userID'],
                'orderTotal' => $_POST['orderTotal'],
                'paymentMethod' => $_POST['paymentMethod']
            ];  
            $total = $_POST['orderTotal'];

            // print_r($inventoryID);
            // print_r($size);
            // print_r($quantity);

            $orderID = $payment->addOrders($orderData);

            if($orderID){

                // direct('add-payment.php');
                    
                if(isset($_SESSION['cart'])){

                    foreach($_SESSION['cart'] as $inventoryID => $inventoryData){

                        foreach($inventoryData['item'] as $size => $data){

                            $orderlineData = [
                                'orderID' => $orderID,
                                'inventoryID' => $inventoryID,
                                'sizeID' => $size,
                                'quantity' => $data['quantity'],
                                'total' => $total
                            ];

                            // print_r($inventoryID);
                            // print_r($size);

                            $payment->addOrderLine($orderlineData);

                            if($orderData['paymentMethod'] == 'COD'){
 
                                $payment->paymentCOD($orderID,$total);
        
                                direct("view-invoice.php?order=$orderID");
                            }elseif($orderData['paymentMethod'] == 'GCash'){
        
                                direct("add-payment.php?order=$orderID");
                            }

                        }

                        // Clear my cart into empty after successfull place order
                        // $cart->emptyCart();
                    }

                }else{

                redirect('Something went wrong','add-place-order.php');
                }

            }
    
        }
        // ADD PLACE ORDER and Payment for COD

    endif;
?>