<?php
    include_once 'admin/controllers/InventoryController.php';
    include_once 'admin/controllers/SizesController.php';
    include_once 'controllers/CartController.php';

    $inventory = new InventoryController;
    $sizes = new SizesController;
    $cart = new CartController;

    // the user is need to login to place an order
    if(isset($_SESSION['authenticated'])) :

        if(isset($_POST['add-place-order-button'])){

                  // userTable came from my Class authenticate
            $data = $authenticate->userTable();
    
            if(empty($data['userFullname']) && empty($data['userNumber']) && empty($data['userAddress']) && empty($data['userGender'])){
    
                // direct('add-place-order.php');
                redirect('Please fill up your information before proceeding to checkout','add-info.php');
            }elseif(!empty($data['userFullname']) && !empty($data['userNumber']) && !empty($data['userAddress']) && !empty($data['userGender'])){
    
                direct('add-payment.php');
            };
    
        }

    endif;
?>