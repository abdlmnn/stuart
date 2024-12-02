<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar with Modal</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        text-decoration: none;
        }

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

        .company-name {
            flex-grow: 1;
            padding-left: 35px;
        }

        .company-name .a-link {
            color: #E2A500;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .header .right-item {
            display: flex;
            gap: 30px;
            position: relative;
        }

        .header .right-item .a-link {
            color: #fff;
            font-weight: bold;
        }

        .header .right-item .a-link:hover {
            color: #E2A500;
        }

        .header .right-item .cart-icon {
            position: absolute;
            font-size: 25px;
            right: 155px;
            top: -10px;
        }

        /* .header .right-item .notification-icon {
            position: absolute;
            font-size: 25px;
            right: 120px;
            top: -10px;
        } */

        .header .right-item .user-icon {
            position: absolute;
            font-size: 25px;
            right: 110px;
            top: -10px;
        }

        .header .right-item .total-item {
            position: absolute;
            top: -15px;
            left: -100px;
            font-size: 12px;
            z-index: 100;
            color: #E2A500;
        }

        /* .header .right-item .total-notification {
            position: absolute;
            top: -20px;
            right: 60px;
            font-size: 15px;
            z-index: 100;
            color: #fff;
        } */

        .header .right-item .logout-btn {
            background: none; 
            border: none; 
            color: #fff; 
            cursor: pointer;
            position: absolute; 
            top: -13px;
            right: 60px;
            z-index: 100; 
            font-family: inherit; 
            text-decoration: none; 
            display: flex; 
            align-items: center; 
            gap: 5px; 
        }

        .header .right-item .logout-btn:hover {
            color: #E2A500;
        }

        .header .right-item .logout-btn .logout-icon {
            font-size: 30px; 
        }

        .hamburger {
            /* display: flex; */
            flex-direction: column;
            gap: 5px;
            padding: 10px;
            cursor: pointer;
            display: none; 
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: #fff;
            border-radius: 5px;
            transition: transform 0.3s ease, opacity 0.3s ease;
            display: flex;
        }

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

        .modal-content {
            display: none;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-content a, .modal-content button {
            color: white;
            font-size: 20px;
            margin: 15px 0;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
        }

        .modal-content a:hover,
        .modal-content button:hover {
            color: #E2A500;
        }

        .modal-content a ion-icon,
        .modal-content button ion-icon {
            font-size: 25px;
            margin-right: 10px;
        }

        .modal-content .logout-icon {
            font-size: 30px;
            padding-left: 7px;
        }

        /* .modal-content .total-notification {
            position: absolute;
            bottom: 85px;
            left: 45px;
            font-size: 15px;
            color: #E2A500;
            font-weight: bold;
            z-index: 100;
        } */

        @media (max-width: 768px) {
            .hamburger {
                display: flex; 
            }

            .header .company-name {
                text-align: center;
            }

            .header .right-item {
                display: none;
            }

            .modal-content {
                width: 100%;
                /* max-width: 250px; */
                max-width: 2500px;
                display: none;
            }

            .modal-content a,
            .modal-content button {
                font-size: 20px;
            }

           
        }

        @media (max-width: 480px) {
            .modal-content {
                width: 100%;
            }
        }

    </style>
</head>
<body>

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

        <form action="" method="post">
            <button type="submit" name="logout-button" class="logout-btn">
                <ion-icon name="log-out-outline" class="logout-icon"></ion-icon>
            </button>
        </form>

        <a href="#" class="a-link">
            <ion-icon name="person-outline" class="user-icon"></ion-icon>
        </a>

        <!-- <a href="#" class="a-link">
            <span class="total-notification">5</span>
            <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
        </a> -->

        <a href="#" class="a-link">
            <span class="total-item">10</span>
            <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
        </a>
    </div>
</div>


<div class="modal-content">

    <!-- <button type="button" class="logout-btn">
        <ion-icon name="log-out-outline" class="logout-icon"></ion-icon>
    </button> -->

    <form action="" method="post">
        <button type="submit" name="logout-button" class="logout-btn">
            <ion-icon name="log-out-outline" class="logout-icon"></ion-icon>
        </button>
    </form>

    <a href="#">
        <ion-icon name="person-outline" class="user-icon"></ion-icon>
    </a>

    <!-- <a href="#" class="a-link">
        <span class="total-notification">5</span>
        <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
    </a> -->

    <a href="#" class="a-link">
        <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
    </a>

    <a href="#" class="a-link">
        Men Clothing
    </a>

    <a href="#" class="a-link">
        Women Clothing
    </a>

    <a href="#" class="a-link">
        Men Shoes
    </a>

    <a href="#" class="a-link">
        Women Shoes
    </a>
</div>

<script>
    const modal = document.querySelector(".modal-content");
    const hamburger = document.querySelector(".hamburger");

    function toggleModal() {

        if (modal.style.display === "flex") {
            modal.style.display = "none"; 
            hamburger.classList.remove("active"); 
        } else {
            modal.style.display = "flex"; 
            hamburger.classList.add("active"); 
        }
    }

    window.addEventListener("resize", () => {

        if (window.innerWidth > 768 && modal.style.display === "flex") {
            modal.style.display = "none"; 
            hamburger.classList.remove("active"); 
        }
    });

</script>

</body>
</html>
