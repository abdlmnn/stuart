<?php
    $title = 'Home';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly();

    include 'includes/header.php';
    include 'includes/navbar.php';
    
    include 'message.php';
?>
<div class="body">

    <!-- <div class="box"> -->

        <div class="box-title">
            <h1 style="color: #000;">Welcome <?= $_SESSION['user']['fullname']; ?></h1>
            <br>
            <a href="<?= base_url('shop.php') ?>" style="color: #E2A500; font-size: 1.7rem;">
                Shop Now
            </a>
        </div>
    <!-- </div> -->
    
</div>
<?php
    include 'includes/footer.php';
?>

