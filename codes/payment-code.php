<?php
    include_once 'admin/controllers/InventoryController.php';
    include_once 'admin/controllers/SizesController.php';
    include_once 'controllers/CartController.php';
    include_once 'controllers/PaymentController.php';

    $inventory = new InventoryController;
    $sizes = new SizesController;
    $cart = new CartController;
    $payment = new PaymentController;

    // the user is need to login to place an order
    if(isset($_SESSION['authenticated'])) :

        if(isset($_POST['add-payment-button']))
        {
            $orderID = $_POST['orderID'];
            $amount = $_POST['amount'];
            $proofPayment = $_FILES['inputProof']['name'];

                        // imagePath came from my Class PaymentController
            $resultPath = $payment->imagePath($proofPayment);

            if($resultPath){
                
                // addPayment came from my Class PaymentController
                $payment->addPayment($orderID,$amount,$proofPayment);
                
                // Clear my cart into empty after successfull place order
                $cart->emptyCart();

                direct("view-order-complete.php?success=$orderID");

            }else{

                showMessage('Something went wrong with the image');
            }
        }

        // ADD PLACE ORDER 
        if(isset($_POST['add-place-order-button'])){

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
                        }

                        // Clear my cart into empty after successfull place order
                        // $cart->emptyCart();
                    }

                    if($orderData['paymentMethod'] == 'COD'){

                        // insert payment even COD

                        // Clear my cart into empty after successfull place order
                        $cart->emptyCart();

                        direct("view-order-complete.php?success=$orderID");
                    }elseif($orderData['paymentMethod'] == 'GCash'){

                        direct("add-payment.php?order=$orderID");
                    }


                }else{

                redirect('Something went wrong','add-place-order.php');
                }

            }
    
        }

    endif;
?>