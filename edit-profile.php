<?php
    $title = 'My Profile';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';

    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly(); 

    include 'includes/header.php';
    include 'includes/navbar.php';
?>
<div class="profile-container">

    <div class="profile-header">
        <h2>My Profile</h2>
    </div>

    <div class="profile-details">
        
        <?php $userRows = $authenticated->userDetails(); ?>

        <form action="codes/profile-code.php" method="post">

            <p><strong>Full Name:</strong> <input type="text" name="inputFullname" value="<?= $userRows['userFullname'] ?>" autofocus required> </p>
            <p><strong>Email:</strong> <input type="email" name="inputEmail" value="<?= $userRows['userEmail'] ?>" required> </p>
            <p><strong>Phone Number:</strong> <input type="tel" name="inputNumber" value="<?= $userRows['userNumber'] ?>" required> </p>
            <p><strong>Address:</strong> <input type="text" name="inputAddress" value="<?= $userRows['userAddress'] ?>" required> </p>
            <p><strong>Gender:</strong> 
                <select name="inputGender" >
                    <option selected>Selected: <?= $userRows['userGender'] ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select> 
            </p>

            <div class="profile-actions">
                <button type="submit" name="edit-button">Submit</button>
                <button>Change Password</button>
            </div>

        </form>
    </div>

</div>
<?php
    include 'includes/footer.php';
?>
