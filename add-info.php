<?php
    $title = 'Information';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/profile-code.php';

    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly();

    include 'includes/header.php';
    include 'includes/navbar.php';

    include 'message.php';
?>
<section class="bg-image">
    <div class="body">

        <div class="box">

            <div class="box-title">
                <span class="title">Information</span>
            </div>

            <form action="" method="post">  

                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Full Name" class="input" name="inputFullname" required autofocus> 
                </div> 
                <div class="row">
                    <i class="fas fa-phone"></i>
                    <input type="text" placeholder="Phone Number" pattern="[0-9]{3}-[0-9}{3}-[0-9]{4}" class="input" name="inputNumber" required>
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
                
                <div class="row button">
                    <button type="submit" name="add-button" class="input button">Save</button>
                </div>

            </form>

        </div>
            
    </div>
</section>
<?php
    include 'includes/footer.php';
?>