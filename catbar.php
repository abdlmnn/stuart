<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header with Text Labels</title>
    <style>
        /* Basic Reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
        }

        /* Company Name */
        .company-name a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
        }

        /* Right Items Section */
        .right-item {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .right-item a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            position: relative;
        }

        .right-item a:hover {
            color: #00bcd4;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            font-size: 12px;
            border-radius: 50%;
            padding: 2px 6px;
        }

        /* Dropdown Menu */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            right: 0;
            top: 40px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1000;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a,
        .dropdown-content button {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
            background-color: white;
            border: none;
            text-align: left;
            font-size: 14px;
            cursor: pointer;
        }

        .dropdown-content a:hover,
        .dropdown-content button:hover {
            background-color: #f0f0f0;
        }

        /* Modal for Mobile */
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

        .modal-content a,
        .modal-content button {
            color: white;
            font-size: 20px;
            margin: 15px 0;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 30px;
            color: white;
            background: none;
            border: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .right-item {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <!-- Hamburger Menu -->
        <div class="hamburger" onclick="toggleModal()">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Company Name -->
        <div class="company-name">
            <a href="#">Stuart Boutique</a>
        </div>

        <!-- Text Labels on Right -->
        <div class="right-item">
            <div class="dropdown">
                <a href="#">Profile</a>
                <div class="dropdown-content">
                    <a href="#">View Profile</a>
                    <button>Logout</button>
                </div>
            </div>

            <a href="#">
                Notifications <span class="badge">5</span>
            </a>

            <a href="#">
                Cart <span class="badge">10</span>
            </a>
        </div>
    </div>

    <!-- Modal Content -->
    <div class="modal-content">
        <button class="close-btn" onclick="toggleModal()">×</button>
        <a href="#">Profile</a>
        <a href="#">Notifications</a>
        <a href="#">Cart</a>
    </div>

    <script>
        function toggleModal() {
            const modal = document.querySelector(".modal-content");
            modal.style.display = modal.style.display === "flex" ? "none" : "flex";
        }
    </script>
</body>
</html>