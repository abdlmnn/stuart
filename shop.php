<?php
    $title = 'Shop';

    include 'config/connect.php';

    include 'codes/authentication_code.php';
    
    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly();

    include 'includes/header.php';
    include 'includes/navbar.php';
    
    // include 'message.php';
?>

<div class="body">

   
    
</div>

<?php
    include 'includes/footer.php';
?>
