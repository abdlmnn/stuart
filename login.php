<?php
    $title = 'Login';
    
    include 'config/connect.php';

    include 'includes/header.php';
    include 'includes/navbar.php';
    
    include 'message.php';
?>
<div class="body">

    <div class="box">

        <div class="box-title">
            <span class="title">Login</span>
        </div>

        <form action="" method="post">

            <div class="row">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" class="input" name="inputEmail" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password"  class="input" name="inputPassword" required/>
            </div>
            <div class="row button">
                <button type="submit" name="login-button" class="input">Login</button>
            </div>

        </form>

    </div>
        
</div>
<?php
    include 'includes/footer.php';
?>