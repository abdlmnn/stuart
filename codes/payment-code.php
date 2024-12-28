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

            $resultAddOrders = $payment->addOrders($orderData);

            if($resultAddOrders){

                // direct('add-payment.php');

                $orderID = $payment->getOrderId();

                if($orderID){
                    
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

                        }

                        // Clear my cart into empty after successfull place order
                        // $cart->emptyCart();
                        
                        // direct('add-payment.php');
                        
                    }
                }else{
                    
                    redirect('No order id found','add-place-order.php');
                }

            }else{

                redirect('Something went wrong','add-place-order.php');
            }

    
        }

    endif;
?>