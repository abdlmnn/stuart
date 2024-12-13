<?php
    $title = 'Home';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly();

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';
    
    include 'message.php';
?>
<!-- <section class="bg-image"> -->
    <div class="body">
        
        <!-- <div class="box"> -->

            <div class="box-title">
                <h1 style="color: #000;">Welcome <?= $_SESSION['user']['fullname']; ?></h1>
                <br>
                <a href="<?= base_url('view-landing.php') ?>" style="color: #E2A500; font-size: 2.0rem;">
                    Shop Now
                </a>
            </div>
        <!-- </div> -->
        
    </div>
<!-- </section> -->
<?php
    include 'includes/footer.php';
?>

