<?php
    $title = 'My Profile';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/profile-code.php';
    include 'codes/change-password-code.php';

    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly(); 

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';

    include 'message.php';
?>

<link rel="stylesheet" href="css/profile6.css">

<div class="profile-container">

    <!-- userDetails came from my Class AuthenticateController  -->
    <?php $userRows = $authenticated->userDetails(); ?>

    <?php if(!empty($_GET['action']) && $_GET['action'] == 'edit-profile') : ?>

        <div class="profile-header">
            <h2>Edit Profile</h2>
        </div>

        <div class="profile-details">

            <form action="" method="post">

                <p><strong>Full Name:</strong> <input type="text" name="inputFullname" value="<?= $userRows['userFullname'] ?>" autofocus required> </p>
                <p><strong>Email:</strong> <input type="email" name="inputEmail" value="<?= $userRows['userEmail'] ?>" required> </p>
                <p><strong>Phone Number:</strong> <input type="tel" name="inputNumber" value="<?= $userRows['userNumber'] ?>" required> </p>
                <p><strong>Address:</strong> <input type="text" name="inputAddress" value="<?= $userRows['userAddress'] ?>" required> </p>
                <p><strong>Gender:</strong> 
                    <select name="inputGender" >
                        <?php if($userRows['userGender'] != 'Male' && $userRows['userGender'] != 'Female' && $userRows['userGender'] == 'Select Gender' || empty($userRows['userGender'])) : ?>

                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        <?php elseif($userRows['userGender'] == 'Male') : ?>

                            <option value="<?= $userRows['userGender'] ?>" selected><?= $userRows['userGender'] ?></option>

                            <option value="Female">Female</option>

                        <?php elseif($userRows['userGender'] == 'Female') : ?>

                            <option value="<?= $userRows['userGender'] ?>" selected><?= $userRows['userGender'] ?></option>

                            <option value="Male">Male</option>

                        <?php endif; ?>
                    </select> 
                </p>

                <div class="profile-actions">
                    <button type="submit" value="<?= $userRows['userID'] ?>" name="edit-button">Save</button>

                    <button type="button" onclick="cancel()">Cancel</button>
                </div>

            </form>
        </div>

    <?php elseif(!empty($_GET['action']) && $_GET['action'] == 'delete-account') : ?>

        <div class="profile-header">
            <h2>Delete Account</h2>
        </div>

        <div class="profile-details">

            <form action="" method="post">
                <!-- <?php echo $userRows['userID'] ?> -->
                
                <p><strong>Full Name:</strong> <?= $userRows['userFullname'] ?></p>
                <p><strong>Email:</strong> <?= $userRows['userEmail'] ?></p>
                <p><strong>Phone Number:</strong> <?= $userRows['userNumber'] ?></p>
                <p><strong>Address:</strong> <?= $userRows['userAddress'] ?></p>
                <p><strong>Gender:</strong> <?= $userRows['userGender'] ?></p>

                <div class="profile-actions">
                    <button type="submit" value="<?= $userRows['userID'] ?>" name="delete-button">Delete</button>

                    <button type="button" onclick="cancel()">Cancel</button>
                </div>
            </form>

        </div>

    <?php elseif(!empty($_GET['action']) && $_GET['action'] == 'change-password') : ?>

        <div class="profile-header">
            <h2>Change Password</h2>
        </div>

        <div class="profile-details">

            <form action="" method="post">

                <p><strong>Current password:</strong> <input type="password" name="inputCurrent" autofocus required> </p>
                <p><strong>New password:</strong> <input type="password" name="inputNew" required> </p>
                <p><strong>Retype new password:</strong> <input type="password" name="inputRetype" required> </p>

                <div class="profile-actions">
                    <button type="submit" value="<?= $userRows['userID'] ?>" name="change-password-button">Save</button>

                    <button type="button" onclick="cancel()">Cancel</button>
                </div>

            </form>
        </div>

    <?php else : ?>

        <div class="profile-header">
            <h2>My Profile</h2>
        </div>

        <div class="profile-details">
            <p><strong>Full Name:</strong> <?= $userRows['userFullname'] ?></p>
            <p><strong>Email:</strong> <?= $userRows['userEmail'] ?></p>
            <p><strong>Phone Number:</strong> <?= $userRows['userNumber'] ?></p>
            <p><strong>Address:</strong> <?= $userRows['userAddress'] ?></p>
            <p><strong>Gender:</strong> <?= $userRows['userGender'] ?></p>

            <div class="profile-actions">
                <button type="submit" onclick="editProfile()">Edit Profile</button>
                <button type="submit" onclick="deleteAccount()">Delete Account</button>
                <button type="submit" onclick="changePassword()">Change Password</button>
            </div>
        </div>

    <?php endif; ?>

</div>
<?php
    include 'includes/footer.php';
?>
