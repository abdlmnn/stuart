<div class="header">

    <div class="hamburger" onclick="toggleModal()">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="company-name">
        <a href="#" class="a-link">Stuart Boutique</a>
    </div>

    <div class="right-item">

        <div class="dropdown">
            <button class="dropbtn">
                <ion-icon name="person-outline" class="user-icon"></ion-icon>
            </button>
            <div class="dropdown-content">
                <a href="#" class="a-drop">Profile</a>
                <button type="button" class="logout-btn">Logout</button>
            </div>
        </div>

        <a href="#" class="a-link">
            <span class="total-notification">5</span>
            <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
        </a>

        <a href="#" class="a-link">
            <span class="total-item">10</span>
            <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
        </a>
    </div>
</div>

<div class="modal-content">
    <button class="close-btn" onclick="toggleModal()">×</button>

    <button type="button" class="logout-btn">
        <ion-icon name="log-out-outline" class="logout-icon"></ion-icon>
    </button>

    <a href="#">
        <ion-icon name="person-outline" class="user-icon"></ion-icon>
    </a>

    <a href="#" class="a-link">
        <span class="total-notification">5</span>
        <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
    </a>

    <a href="#" class="a-link">
        <span class="total-item">10</span>
        <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
    </a>
</div>