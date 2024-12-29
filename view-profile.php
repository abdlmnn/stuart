<?php
    $title = 'My Profile';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/profile-code.php';
    include 'codes/change-password-code.php';
    include 'codes/cart-code.php';

    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly(); 
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';

    include 'message.php';
?>
<link rel="stylesheet" href="css/profile.css?v=7.5">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $resultOrders = $authenticate->exactOrders();

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
                            <td>
                                <a href="#" class="btn view-data">View</a>
                            </td>
                        </tr>

                        <?php 
                                endwhile;
                            }
                        ?>
                        <!-- Order Row 2 -->
                        <!-- <tr>
                            <td>#123457</td>
                            <td>December 18, 2024</td>
                            <td>2 Items</td>
                            <td>$75.00</td>
                            <td><span class="order-status pending">Pending</span></td>
                            <td><a href="#" class="btn">View Details</a></td>
                        </tr> -->
                        <!-- Order Row 3 -->
                        <!-- <tr>
                            <td>#123458</td>
                            <td>December 15, 2024</td>
                            <td>1 Item</td>
                            <td>$35.00</td>
                            <td><span class="order-status cancelled">Cancelled</span></td>
                            <td><a href="#" class="btn">View Details</a></td>
                        </tr> -->
                    </tbody>
                </table>

                </div>
                
            </div>

            <div class="tab" id="messages">
                <h1>MY MESSAGES</h1>

                <div class="notification-item">
                    <div class="notification-content">
                        <p>Your order #123456 has been successfully delivered. Thank you for shopping with us!</p>
                    </div>
                </div>

                <div class="notification-item">
                    <div class="notification-content">
                        <p>Your payment for order #123457 has been confirmed. We are now processing your order.</p>
                    </div>
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
