<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar with Modal</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
        }

        /* Header style */
        .header {
            background-color: #111;
            padding: 0.5em 2em;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
        }

        /* Centering the logo */
        .company-name {
            flex-grow: 1;
            text-align: left;
        }

        .company-name .a-link {
            color: #E2A500;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        /* Right items (Profile, Cart, Notifications) */
        .header .right-item {
            display: flex;
            gap: 30px;
            position: relative;
        }

        .header .right-item .a-link {
            color: #fff;
            font-weight: bold;
        }

        /* Icon positioning */
        .header .right-item .cart-icon {
            position: absolute;
            font-size: 25px;
            right: 90px;
            top: -10px;
        }

        .header .right-item .notification-icon {
            position: absolute;
            font-size: 25px;
            right: 42px;
            top: -10px;
        }

        .header .right-item .user-icon {
            position: absolute;
            font-size: 25px;
            right: 0;
            top: -10px;
        }

        /* Total item and notification count positioning */
        .header .right-item .total-item {
            position: absolute;
            top: -20px;
            left: -64px;
            font-size: 15px;
            z-index: 100;
            color: #fff;
        }

        .header .right-item .total-notification {
            position: absolute;
            top: -20px;
            right: 60px;
            font-size: 15px;
            z-index: 100;
            color: #fff;
        }

        /* Dropdown button styling */
        .header .right-item .dropbtn {
            position: absolute;
            left: 60px;
            background-color: #111;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        /* Dropdown content styling */
        .header .right-item .dropdown-content {
            display: none;
            position: absolute;
            margin-top: 13px;
            background-color: #111;
            min-width: 100px;
            z-index: 1;
            right: 1;
            padding: 10px 20px;
            border-radius: 15px;
        }

        .header .right-item .dropdown-content .a-drop {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
        }

        .header .right-item .dropdown-content .logout-btn {
            background-color: #111;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            padding-top: 15px;
        }

        /* Dropdown hover effect */
        .dropdown:hover .dropdown-content {
            display: block;
        }


        /* Hamburger icon (mobile) */
        .hamburger {
            /* display: flex; */
            flex-direction: column;
            gap: 5px;
            padding: 10px;
            cursor: pointer;
            display: none; 
        }

        .hamburger div {
            width: 30px;
            height: 3px;
            background-color: white;
            border-radius: 5px;
            transition: transform 0.3s ease, opacity 0.3s ease;
            display: flex;
        }

        /* When hamburger is active (clicked), rotate the bars to form a cross */
        .hamburger.active div:nth-child(1) {
            transform: rotate(45deg);
            position: relative;
            top: 8px;
        }

        .hamburger.active div:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active div:nth-child(3) {
            transform: rotate(-45deg);
            position: relative;
            top: -8px;
        }

        /* Modal Navbar */
        .modal-content {
            background-color: #111;
            width: 80%;
            max-width: 300px;
            padding: 20px;
            border-radius: 8px;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Center the modal */
            z-index: 1000;
            flex-direction: column;
            gap: 20px;
        }

        /* Icon and button styling in modal */
        .modal-content button {
            display: flex;
            align-items: center;
            color: #fff;
            background-color: #111;
            border: none;
            cursor: pointer;
            
        }
        .modal-content a {
            font-size: 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            color: #fff;
            cursor: pointer;
        }

        .modal-content a ion-icon,
        .modal-content button ion-icon {
            font-size: 25px;
            margin-right: 10px;
        }

        .modal-content .total-item {
            position: absolute;
            bottom: 35px;
            left: 45px;
            font-size: 15px;
            color: #E2A500;
            font-weight: bold;
            z-index: 100;
        }

        .modal-content .total-notification {
            position: absolute;
            bottom: 85px;
            left: 45px;
            font-size: 15px;
            color: #E2A500;
            font-weight: bold;
            z-index: 100;
        }

        /* Close button */
        .close-btn {
            background-color: transparent;
            color: white;
            border: none;
            font-size: 24px;
            cursor: pointer;
            align-self: flex-end;
        }

        /* Logout icon */
        .logout-icon {
            font-size: 22px;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .hamburger {
                display: flex; /* Show hamburger on small screens */
            }

            .header .company-name {
                text-align: center;
                flex-grow: 0;
            }

            .header .right-item {
                display: none; /* Hide right items on small screens */
            }

            .modal-content {
                width: 90%;
                max-width: 350px;
                display: none;
            }

            .modal-content a,
            .modal-content button {
                font-size: 18px;
            }

            .modal-content a ion-icon,
            .modal-content button ion-icon {
                font-size: 28px;
            }

            /* Adjust positions for the mobile view */
            .modal-content .total-item,
            .modal-content .total-notification {
                font-size: 14px;
            }

            /* Adjust icon spacing on smaller screens */
            .modal-content a ion-icon,
            .modal-content button ion-icon {
                margin-right: 8px;
            }

            .close-btn {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                width: 95%;
            }

            .modal-content a,
            .modal-content button {
                font-size: 16px;
            }

            .modal-content a ion-icon,
            .modal-content button ion-icon {
                font-size: 30px;
            }

            .modal-content .total-item,
            .modal-content .total-notification {
                font-size: 16px;
            }

            .close-btn {
                font-size: 32px;
            }
        }

    </style>
</head>
<body>

<div class="header">
    <!-- Hamburger Icon (for mobile) -->
    <div class="hamburger" onclick="toggleModal()">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Company Logo (Centered) -->
    <div class="company-name">
        <a href="#" class="a-link">Stuart Boutique</a>
    </div>

    <!-- Right Items (Profile, Cart, Notifications) -->
    <div class="right-item">
        <!-- Profile Dropdown -->
        <div class="dropdown">
            <button class="dropbtn">
                <ion-icon name="person-outline" class="user-icon"></ion-icon>
            </button>
            <div class="dropdown-content">
                <a href="#" class="a-drop">Profile</a>
                <button type="button" class="logout-btn">Logout</button>
            </div>
        </div>

        <!-- Notifications Icon -->
        <a href="#" class="a-link">
            <span class="total-notification">5</span>
            <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
        </a>

        <!-- Cart Icon -->
        <a href="#" class="a-link">
            <span class="total-item">10</span>
            <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
        </a>
    </div>
</div>

<!-- Modal Content -->
<div class="modal-content">
    <button class="close-btn" onclick="toggleModal()">×</button>
    
    <!-- Profile Icon -->
    <a href="#">
        <ion-icon name="person-outline" class="user-icon"></ion-icon>
    </a>
    
    <!-- Logout Icon -->
    <button type="button" class="logout-btn">
        <ion-icon name="log-out-outline" class="logout-icon"></ion-icon>
    </button>
    
    <!-- Notifications Icon -->
    <a href="#" class="a-link">
        <span class="total-notification">5</span>
        <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
    </a>
    
    <!-- Cart Icon -->
    <a href="#" class="a-link">
        <span class="total-item">10</span>
        <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
    </a>
</div>

<script>
    function toggleModal() {
        const modal = document.querySelector(".modal-content");
        const hamburger = document.querySelector(".hamburger");

        // Toggle the modal visibility
        if (modal.style.display === "flex") {
            modal.style.display = "none"; // Close the modal
            hamburger.classList.remove("active"); // Remove active class from hamburger
        } else {
            modal.style.display = "flex"; // Open the modal
            hamburger.classList.add("active"); // Add active class to hamburger
        }
    }
</script>

</body>
</html>
