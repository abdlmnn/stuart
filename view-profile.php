<?php
    $title = 'My Account';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/profile-code.php';
    include 'codes/change-password-code.php';
    include 'codes/cart-code.php';
    include 'codes/payment-code.php';

    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly(); 
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';

    include 'message.php';
?>
<link rel="stylesheet" href="css/profile.css?v=8.5">
<link rel="stylesheet" href="css/order-modal.css?v=1.5">

    <div id="itemModal" class="view-modal-container">

        <div class="first-child-container">

            <div class="second-child-container">

                <div class="item-modal-container">

                    <!-- Content -->
                     
                </div>
                
            </div>

        </div>

    </div>

    <div class="profile-container">

        <aside class="sidebar-container">

            <div class="section-action">

                <h4>Personal Center</h4>

                <ul>
                    <li>
                        <a href="view-profile.php" onclick="showTab('orders')">My Orders</a>
                    </li>
                    <li>
                        <a href="#" onclick="showTab('profile')">My Profile</a>
                    </li>
                    <li>
                        <a href="#" onclick="showTab('edit-profile')">Edit Profile</a>
                    </li>
                    <li>
                        <a href="#" onclick="showTab('delete-profile')">Delete Account</a>
                    </li>
                    <li>
                        <a href="#" onclick="showTab('change-password')">Change Password</a>
                    </li>
                </ul>

            </div>

        </aside>

        <!-- userDetails came from my Class AuthenticateController  -->
        <?php $userRows = $authenticated->userDetails(); ?>
        <section class="acount-info-container">

            <div class="tab" id="orders">
                <h1>MY ORDERS</h1>

                <div class="table-orders-container">

                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $resultOrders = $authenticated->exactOrders();

                            // print_r($resultOrders);

                            if(!$resultOrders){

                                showMessage('No Orders Record Found');
                            }else{

                                while($orderData = $resultOrders->fetch_assoc()) :

                                // print_r($orderData);

                                $formattedDate = date('F j, Y, g:i a', strtotime($orderData['orderDate']));
                        ?>
                        <tr>
                            <td class="orderID"><?= $orderData['orderID'] ?></td>
                            <td><?= $formattedDate ?></td>
                            <td><?= number_format($orderData['orderAmount']) ?></td>
                            <td><span class="order-status <?= $orderData['paymentStatus'] ?>"><?= $orderData['paymentStatus'] ?></span></td>
                            <td><span class="order-status <?= $orderData['orderStatus'] ?>"><?= $orderData['orderStatus'] ?></span></td>
                            <td style="display: flex; ">
                                <a href="#" class="btn view-data">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                <form action="" method="post">
                                    <button type="submit" name="delete-order-details-button" value="<?= $orderData['orderID'] ?>" class="btn"
                                    
                                    >
                                    <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                <?php if($orderData['paymentStatus'] === 'unpaid' && $orderData['orderStatus'] === 'pending') : ?>

                                <a href="view-link-invoice.php?order=<?= $orderData['orderID'] ?>" target="_blank" class="btn"
                                ><i class="fa-solid fa-file-invoice"></i></a>

                                <?php elseif($orderData['paymentStatus'] === 'paid' && $orderData['orderStatus'] === 'approved') : ?>

                                <a href="view-receipt.php?order=<?= $orderData['orderID'] ?>" target="_blank" class="btn"
                                ><i class="fa-solid fa-receipt"></i></a>

                                <?php else : ?>

                                <?php endif; ?>
                            </td>
                        </tr>

                        <?php 
                                endwhile;
                            }
                        ?>
                    </tbody>
                </table>

                </div>
                
            </div>

            <div class="tab" id="profile">
                <h1>MY PROFILE</h1>

                <div class="form-group">
                    <label>Email</label>
                    <button class="info-btn"><?= $userRows['userEmail'] ?></button>
                </div>

                <div class="form-group">
                    <label>Fullname</label>
                    <button class="info-btn"><?= $userRows['userFullname'] ?></button>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <button class="info-btn"><?= $userRows['userNumber'] ?></button>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <button class="info-btn"><?= $userRows['userAddress'] ?></button>
                </div>

                <div class="form-group">
                    <label >Gender</label>
                    <button class="info-btn"><?= $userRows['userGender'] ?></button>
                </div>
            </div>

            <div class="tab" id="edit-profile">
                <h1>EDIT PROFILE</h1>
                <form action="" method="post">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="inputEmail" value="<?= $userRows['userEmail'] ?>" placeholder="Enter your email" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" name="inputFullname" value="<?= $userRows['userFullname'] ?>" placeholder="Enter your full name" required>
                        </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="inputNumber" value="<?= $userRows['userNumber'] ?>" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="inputAddress" value="<?= $userRows['userAddress'] ?>" placeholder="Enter your address" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
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
                    </div>

                    <div class="btn-container">
                        <button type="submit" value="<?= $userRows['userID'] ?>" name="edit-button" class="btn save">Save</button>
                        <button type="button" onclick="cancel1()" class="btn cancel">Cancel</button>
                    </div>

                </form>
            </div>

            <div class="tab" id="delete-profile">
                <h1>DELETE ACCOUNT</h1>

                <div class="form-group">
                    <label>Email</label>
                    <button class="info-btn"><?= $userRows['userEmail'] ?></button>
                </div>
                <div class="form-group">
                    <label>Fullname</label>
                    <button class="info-btn"><?= $userRows['userFullname'] ?></button>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <button class="info-btn"><?= $userRows['userNumber'] ?></button>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <button class="info-btn"><?= $userRows['userAddress'] ?></button>
                </div>
                <div class="form-group">
                    <label >Gender</label>
                    <button class="info-btn"><?= $userRows['userGender'] ?></button>
                </div>

                <form action="" method="post">

                    <div class="btn-container">

                        <button type="submit" value="<?= $userRows['userID'] ?>" name="delete-button" class="btn save">Delete</button>

                        <button type="button" onclick="cancel1()" class="btn cancel">Cancel</button>

                    </div>

                </form>
            </div>

            <div class="tab" id="change-password">
                <h1>CHANGE PASSWORD</h1>
                <form action="" method="post">

                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" name="inputCurrent" autofocus required id="current-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter your current password">
                        <span class="show-password" onclick="togglePasswordVisibility('current-password', this)">Show</span>
                    </div>

                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" name="inputNew" required id="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter your new password">
                        <span class="show-password" onclick="togglePasswordVisibility('new-password', this)">Show</span>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" name="inputRetype" required id="confirm-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm your new password">
                        <span class="show-password" onclick="togglePasswordVisibility('confirm-password', this)">Show</span>
                    </div>

                    <div class="btn-container">

                        <button type="submit" value="<?= $userRows['userID'] ?>" name="change-password-button" class="btn save">Save</button>

                        <button type="button" onclick="cancel1()" class="btn cancel">Cancel</button>

                    </div>

                </form>

            </div>

        </section>

    </div>
<?php
    include 'includes/footer.php';
?>
<script>

function cancel1(){
    window.location.href = 'view-profile.php';
}
    
function showTab(tabId){

    const tabs = document.querySelectorAll('.tab');

    tabs.forEach(tab => tab.classList.remove('active'));
        
    document.getElementById(tabId).classList.add('active');

}

showTab('orders');

function togglePasswordVisibility(fieldId, toggleElement){

    const field = document.getElementById(fieldId);

    if(field.type === "password"){

        field.type = "text";
        toggleElement.textContent = "Hide";
    }else{

        field.type = "password";
        toggleElement.textContent = "Show";
    }

}

$(document).ready(function () {
    $('.view-data').click(function (e) {
        e.preventDefault();

        // console.log('hi');

        var orderID = $(this).closest('tr').find('.orderID').text();

        // console.log(orderID);

        $.ajax({
            method: "POST",
            url: "codes/modal-code.php",
            data: {
                'view-order-button': true,
                'id': orderID,
            },
            success: function(response) {

                // console.log(response);

                $('.item-modal-container').html(response);

                $('#itemModal').addClass('show-modal'); 
            }

        });

    });

    $(document).mouseup(function(e) {
        var modalContent = $(".item-modal-container");

        if (!modalContent.is(e.target) && modalContent.has(e.target).length === 0) {

            $('#itemModal').removeClass('show-modal');
        }

    });
    
});

</script>
