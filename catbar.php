<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage My Account</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
}

.header {
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    align-items: center;
    /* border: 2px solid red; */
}

.header .logo {
    font-size: 20px;
    font-weight: bold;
}

.header .navigation a {
    margin: 0 10px;
    color: #333;
    text-decoration: none;
    font-size: 14px;
}

.container {
    display: flex;
    margin: 20px;
    justify-content: center;
    /* border: 2px solid red; */
}

.sidebar {
    border: 2px solid red;
    width: 10%;
    background: #fff;
    padding: 20px;
    /* border: 1px solid #ddd; */
    /* border-radius: 5px; */
    /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
}

.sidebar .section h4 {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    margin-bottom: 10px;
}

.sidebar ul li a {
    text-decoration: none;
    color: #555;
    font-size: 14px;
}

        .account-details {
            width: 75%;
            background: #fff;
            padding: 30px;
            margin-left: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .account-details h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .profile-detail {
            display: flex;
            margin-bottom: 15px;
        }

        .profile-detail label {
            width: 30%;
            font-weight: bold;
            color: #555;
        }

        .profile-detail span {
            width: 70%;
            color: #333;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            background-color: #111;
            color: #fff;
            font-size: 14px;
            margin-top: 20px;
        }

        .btn:hover {
            opacity: 0.9;
        }
        .account-details {
            width: 75%;
            background: #fff;
            padding: 30px;
            margin-left: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .account-details h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            /* border-bottom: 1px solid #111; */
            border: none;
            border-bottom: 1px solid #111;
            border-radius: 5px;
            outline: none;
        }

        .show-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #555;
            cursor: pointer;
        }

        .btn-container {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn.save {
            background-color: #111;
            color: #fff;
        }

        .btn.cancel {
            background-color: #111;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.9;
        }
        /* .account-details {
            width: 75%;
            background: #fff;
            padding: 30px;
            margin-left: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .account-details h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #333;
            outline: none;
        } */

        /* .btn-container {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn.save {
            background-color: #111;
            color: #fff;
        }

        .btn.cancel {
            background-color: #111;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.9;
        } */
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">SHEIN</div>
        <nav class="navigation">
            <a href="#">Categories</a>
            <a href="#">New In</a>
            <a href="#">Sale</a>
            <a href="#">Women Clothing</a>
            <a href="#">Men Clothing</a>
        </nav>
    </header>

    <main class="container">
        <aside class="sidebar">
            <div class="section">
                <h4>Personal Center</h4>
                <ul>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">Edit Profile</a></li>
                    <li><a href="#">Delete Account</a></li>
                    <li><a href="#">Change Password</a></li>
                </ul>
            </div>
            <!-- <div class="section">
                <h4>My Orders</h4>
                <ul>
                    <li><a href="#">Order History</a></li>
                    <li><a href="#">My Favorites</a></li>
                </ul>
            </div> -->
        </aside>

        <!-- <section class="account-details">
            <h1>My Profile</h1>
            <div class="profile-detail">
                <label>Email:</label>
                <span>m**************n@my.smciligan.edu.ph</span>
            </div>
            <div class="profile-detail">
                <label>Full Name:</label>
                <span>Abdulmanan</span>
            </div>
            <div class="profile-detail">
                <label>Phone Number:</label>
                <span>0989224</span>
            </div>
            <div class="profile-detail">
                <label>Address:</label>
                <span>Tibanga</span>
            </div>
            <div class="profile-detail">
                <label>Gender:</label>
                <span>Male</span>
            </div>
        </section>
        <section class="account-details">
            <h1>Edit Profile</h1>
            <form>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" value="m**************n@my.smciligan.edu.ph">
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" placeholder="Enter your full name" value="Abdulmanan">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" placeholder="Enter your phone number" value="0989224">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" placeholder="Enter your address" value="Tibanga">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender">
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn save">Save Changes</button>
                    <button type="button" class="btn cancel">Cancel</button>
                </div>
            </form>
        </section> -->
        <section class="account-details">
            <h1>Change Password</h1>
            <form>
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" id="current-password" placeholder="Enter your current password">
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" placeholder="Enter your new password">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm New Password</label>
                    <input type="password" id="confirm-password" placeholder="Confirm your new password">
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn save">Save Changes</button>
                    <button type="button" class="btn cancel">Cancel</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
