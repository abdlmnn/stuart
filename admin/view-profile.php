<?php
    $title = 'Dashboard';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/ProfileController.php';

    $authenticated = new AuthenticateController;
    $profile = new ProfileController;

    $authenticated->adminOnly();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>

<link rel="stylesheet" href="css/profile.css">

<main>
    <h1>My Profile</h1>
    <hr>

    <?php $adminRow = $profile->adminDetails(); ?>
    
    <div class="profile-container">

        <?php if(!empty($_GET['action']) && $_GET['action'] == 'edit-profile') : ?>

            <div class="profile-actions">
                <button type="submit" value="<?= $adminRow['userID'] ?>" name="edit-button">Save</button>

                <button type="button" onclick="cancel()">Cancel</button>
            </div>

            <div class="profile-details">

            <form action="" method="post">

                <p><strong>Full Name:</strong> <input type="text" id="fullname" name="inputFullname" value="<?= $adminRow['userFullname'] ?>" autofocus required> </p>
                <p><strong>Email:</strong> <input type="email" id="email" name="inputEmail" value="<?= $adminRow['userEmail'] ?>" required> </p>
                <p><strong>Number:</strong> <input type="tel" id="number" name="inputNumber" value="<?= $adminRow['userNumber'] ?>" required> </p>
                <p><strong>Address:</strong> <input type="text" id="address" name="inputAddress" value="<?= $adminRow['userAddress'] ?>" required> </p>
                <p><strong>Gender:</strong> 
                    <select name="inputGender" id="gender">
                        <?php if($adminRow['userGender'] != 'Male' && $adminRow['userGender'] != 'Female' && $adminRow['userGender'] == 'Select Gender' || empty($adminRow['userGender'])) : ?>

                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        <?php elseif($adminRow['userGender'] == 'Male') : ?>

                            <option value="<?= $adminRow['userGender'] ?>" selected><?= $adminRow['userGender'] ?></option>

                            <option value="Female">Female</option>

                        <?php elseif($adminRow['userGender'] == 'Female') : ?>

                            <option value="<?= $adminRow['userGender'] ?>" selected><?= $adminRow['userGender'] ?></option>

                            <option value="Male">Male</option>

                        <?php endif; ?>
                    </select> 
                </p>

                </form>

            </div>

        <?php elseif(!empty($_GET['action']) && $_GET['action'] == 'delete-account') : ?>

            <div class="profile-actions">
                <button type="submit" value="<?= $adminRow['userID'] ?>" name="delete-button">Delete</button>

                <button type="button" onclick="cancel()">Cancel</button>
            </div>

            <div class="profile-details">

                <p><strong>Full Name:</strong> 
                    <button class="display" id="fullname"><?= $adminRow['userFullname'] ?></button>
                </p>
                <p><strong>Email:</strong> 
                    <button class="display" id="email"><?= $adminRow['userEmail'] ?></button> 
                </p>
                <p><strong>Phone number:</strong> 
                    <button class="display" id="number"><?= $adminRow['userNumber'] ?></button> 
                </p>
                <p><strong>Address:</strong>
                    <button class="display" id="address"><?= $adminRow['userAddress'] ?></button> 
                </p>
                <p><strong>Gender:</strong> 
                    <button class="display" id="gender"><?= $adminRow['userGender'] ?></button> 
                </p>

            </div>

        <?php elseif(!empty($_GET['action']) && $_GET['action'] == 'change-password') : ?>
            
            <div class="profile-actions">
                <button type="submit" value="<?= $adminRow['userID'] ?>" name="save-change-password-button">Save</button>

                <button type="button" onclick="cancel()">Cancel</button>
            </div>

            <div class="profile-details">

                <form action="" method="post">

                    <p><strong>Current password:</strong> <input type="password" id="current" name="inputCurrent" autofocus required> </p>
                    <p><strong>New password:</strong> <input type="password" id="new" name="inputNew" required> </p>
                    <p><strong>Retype new password:</strong> <input type="password" id="retype" name="inputRetype" required> </p>
                    
                </form>

            </div>

        <?php else : ?>

        <div class="profile-actions">
                <button type="submit" onclick="editProfile()">Edit Profile</button>
                <button type="submit" onclick="deleteAccount()">Delete Account</button>
                <button type="submit" onclick="changePassword()">Change Password</button>
        </div>

        <div class="profile-details">

            <p><strong>Full Name:</strong> <br>
                <button class="display" id="fullname"><?= $adminRow['userFullname'] ?></button>
            </p>
            <p><strong>Email:</strong> <br>
                <button class="display" id="email"><?= $adminRow['userEmail'] ?></button> 
            </p>
            <p><strong>Phone number:</strong> <br>
                <button class="display" id="number"><?= $adminRow['userNumber'] ?></button> 
            </p>
            <p><strong>Address:</strong><br>    
                <button class="display" id="address"><?= $adminRow['userAddress'] ?></button> 
            </p>
            <p><strong>Gender:</strong> <br>
                <button class="display" id="gender"><?= $adminRow['userGender'] ?></button> 
            </p>

        </div>

        <?php endif; ?>

    </div>
</main>
<?php include 'includes/footer.php'; ?>