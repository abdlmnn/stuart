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

        <p><strong>Full Name:</strong> <?= $userRows['userFullname'] ?></p>
        <p><strong>Email:</strong> <?= $userRows['userEmail'] ?></p>
        <p><strong>Phone Number:</strong> <?= $userRows['userNumber'] ?></p>
        <p><strong>Address:</strong> <?= $userRows['userAddress'] ?></p>
        <p><strong>Gender:</strong> <?= $userRows['userGender'] ?></p>

        <div class="profile-actions">
            <button type="submit" onclick="editProfile()">Edit Profile</button>
            <button type="submit" onclick="changePassword()">Change Password</button>
        </div>
    </div>

</div>
<?php
    include 'includes/footer.php';
?>
