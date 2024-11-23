<?php
    $title = 'Register';
    
    include 'config/connect.php';

    include 'codes/authentication_code.php';

    $login->UserLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';

    include 'message.php';
?>
<div class="body">

    <div class="box">

        <div class="box-title">
            <span class="title">Register</span>
        </div>

        <form action="" method="post">  

            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Full Name" class="input" name="inputFullname" required autofocus> 
            </div>
            <div class="row">
                <i class="fas fa-phone"></i>
                <input type="text" placeholder="Phone Number" class="input" name="inputNumber" required>
            </div>
            <div class="row">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" placeholder="Address" class="input" name="inputAddress" required>
            </div>
            <div class="row">
                <i class="fas fa-venus-mars"></i>
                <select name="inputGender" class="input" required>
                    <option>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="row">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" class="input" name="inputEmail" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" class="input" name="inputPassword" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" class="input" name="inputConfirmPassword" required>
            </div>
            
            <div class="row button">
                <button type="submit" name="register-button" class="input">Register</button>
            </div>

        </form>

    </div>
        
</div>
<?php
    include 'includes/footer.php';
?>