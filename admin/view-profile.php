<?php
    $title = 'Profile';

    include '../config/connect.php';

    include 'codes/profile-code.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/ProfileController.php';

    $authenticated = new AuthenticateController;
    $profile = new ProfileController;

    $authenticated->adminOnly();
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>

<link rel="stylesheet" href="css/profile.css?v=1.1">

<main>
    <h1>My Profile</h1>
    <hr>

    <?php $adminRow = $profile->adminDetails(); ?>
    
    <div class="profile-container">

        <?php if(!empty($_GET['action']) && $_GET['action'] == 'edit-profile') : ?>

            <div class="profile-actions">
                <button type="submit" onclick="deleteAccount()">Delete Account</button>
                <button type="submit" onclick="changePassword()">Change Password</button>
            </div>

            <div class="profile-details">

                <form action="" method="post">

                    <p ><strong>Full Name:</strong> 
                        <input type="text" id="fullname" name="inputFullname" value="<?= $adminRow['userFullname'] ?>" autofocus style="font-size: 1rem;"> 
                    </p>
                    <p><strong>Email:</strong> 
                        <input type="email" id="email" name="inputEmail" value="<?= $adminRow['userEmail'] ?>" style="font-size: 1rem;"> 
                    </p>
                    <p><strong>Number:</strong> 
                        <input type="tel" id="number" name="inputNumber" value="<?= $adminRow['userNumber'] ?>" style="font-size: 1rem;"> 
                    </p>
                    <p><strong>Address:</strong> 
                        <input type="text" id="address" name="inputAddress" value="<?= $adminRow['userAddress'] ?>" style="font-size: 1rem;"> 
                    </p>
                    <p><strong>Gender:</strong> 
                        <select name="inputGender" id="gender" style="font-size: 1rem;">
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

                    <div class="btn-container">
                        <button type="submit" value="<?= $adminRow['userID'] ?>" name="edit-button">Save</button>

                        <button type="button" onclick="cancel()">Cancel</button>
                    </div>

                </form>

            </div>

        <?php elseif(!empty($_GET['action']) && $_GET['action'] == 'delete-account') : ?>

            <div class="profile-actions">
                <button type="submit" onclick="editProfile()">Edit Profile</button>
                <button type="submit" onclick="changePassword()">Change Password</button>
            </div>

            <div class="profile-details">

                <form action="" method="post">

                    <p><strong>Full Name:</strong> 
                        <button class="display" id="fullname" style="font-size: 1rem;"><?= $adminRow['userFullname'] ?></button>
                    </p>
                    <p><strong>Email:</strong> 
                        <button class="display" id="email" style="font-size: 1rem;"><?= $adminRow['userEmail'] ?></button> 
                    </p>
                    <p><strong>Number:</strong> 
                        <button class="display" id="number" style="font-size: 1rem;"><?= $adminRow['userNumber'] ?></button> 
                    </p>
                    <p><strong>Address:</strong>
                        <button class="display" id="address" style="font-size: 1rem;"><?= $adminRow['userAddress'] ?></button> 
                    </p>
                    <p><strong>Gender:</strong> 
                        <button class="display" id="gender" style="font-size: 1rem;"><?= $adminRow['userGender'] ?></button> 
                    </p>

                    <div class="btn-container">
                        <button type="submit" value="<?= $adminRow['userID'] ?>" name="delete-button">Delete</button>

                        <button type="button" onclick="cancel()">Cancel</button>
                    </div>

                </form>

            </div>

        <?php elseif(!empty($_GET['action']) && $_GET['action'] == 'change-password') : ?>
            
            <div class="profile-actions">
                <button type="submit" onclick="editProfile()">Edit Profile</button>
                <button type="submit" onclick="deleteAccount()">Delete Account</button>
            </div>

            <div class="profile-details">

                <form action="" method="post">

                    <p><strong>Current password:</strong> 
                        <input type="password" id="current" name="inputCurrent" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required style="font-size: 1rem;"> 
                    </p>

                    <p><strong>New password:</strong> 
                        <input type="password" id="new" name="inputNew" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required style="font-size: 1rem;"> 
                    </p>

                    <p><strong>Retype new password:</strong> 
                        <input type="password" id="retype" name="inputRetype" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required style="font-size: 1rem;"> 
                    </p>

                    <label class="check-container"> Show all passwords?
                        <input type="checkbox" id="showPasswordCheckbox" onclick="showPassword()">
                        <span class="checkmark"></span>
                    </label>

                    <div class="btn-container">
                        <button type="submit" value="<?= $adminRow['userID'] ?>" name="save-change-password-button">Save</button>

                        <button type="button" onclick="cancel()">Cancel</button>
                    </div>

                </form>

            </div>

            <div id="message">
                <div class="message-container current">
                    <h4>Password must contain the following:</h4>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
            </div>

            <div id="message2">
                <div class="message-container new">
                    <h4>Password must contain the following:</h4>
                    <p id="capital1" class="invalid1">A <b>capital (uppercase)</b> letter</p>
                    <p id="letter1" class="invalid1">A <b>lowercase</b> letter</p>
                    <p id="number1" class="invalid1">A <b>number</b></p>
                    <p id="length1" class="invalid1">Minimum <b>8 characters</b></p>
                </div>
            </div>
            
        <?php else : ?>

        <div class="profile-actions">
            <button type="submit" onclick="editProfile()">Edit Profile</button>
            <button type="submit" onclick="deleteAccount()">Delete Account</button>
            <button type="submit" onclick="changePassword()">Change Password</button>
        </div>

        <div class="profile-details">

            <p><strong>Full Name:</strong> <br>
                <button class="display" id="fullname" style="font-size: 1rem;"><?= $adminRow['userFullname'] ?></button>
            </p>
            <p><strong>Email:</strong> <br>
                <button class="display" id="email" style="font-size: 1rem;"><?= $adminRow['userEmail'] ?></button> 
            </p>
            <p><strong>Number:</strong> <br>
                <button class="display" id="number" style="font-size: 1rem;"><?= $adminRow['userNumber'] ?></button> 
            </p>
            <p><strong>Address:</strong><br>    
                <button class="display" id="address" style="font-size: 1rem;"><?= $adminRow['userAddress'] ?></button> 
            </p>
            <p><strong>Gender:</strong> <br>
                <button class="display" id="gender" style="font-size: 1rem;"><?= $adminRow['userGender'] ?></button> 
            </p>

        </div>

        <?php endif; ?>

    </div>
</main>
<?php include 'includes/footer.php'; ?>