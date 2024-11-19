    
<div class="header">

    <div class="left-item">
        <div class="company-name">
            <a href="" class="a-link">Stuart Boutique</a>
        </div>
    </div>
    
    <div class="right-item">
        <?php
            if(isset($_SESSION['authenticated'])) :
        ?>
            <!-- <a href="" class="a-link">
                <ion-icon name="person-outline" class="user-icon"></ion-icon>
            </a> -->
            
            <div class="dropdown">
                <button class="dropbtn"><ion-icon name="person-outline" class="user-icon"></ion-icon></button>
                <div class="dropdown-content">
                    <a href="<?= base_url('profile.php') ?>" class="a-drop">Profile</a>
                    <form action="" method="post">
                        <button type="submit" name="logout-button" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>

            <a href="" class="a-link">
                <span class="total-notification">5</span>
                <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
            </a>

            <a href="" class="a-link">
                <span class="total-item">10</span>
                <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
            </a>
        <?php
            else :
        ?>
            <a href="<?= base_url('register.php') ?>" class="a-link">Register</a>
            <a href="<?= base_url('login.php') ?>" class="a-link">Login</a>
        <?php
            endif;
        ?>
    </div>

</div>

