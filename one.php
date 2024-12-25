<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Messages</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        /* Header */
        .header {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            padding: 15px 30px;
            align-items: center;
        }

        .header .logo {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        .header .navigation a {
            margin: 0 15px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        /* Notifications Section */
        .notifications-container {
            margin: 30px auto;
            max-width: 800px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .notifications-container h1 {
            font-size: 26px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Notification Item */
        .notification-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }

        .notification-item:hover {
            background-color: #f0f0f0;
        }

        .notification-content {
            max-width: 80%;
        }

        .notification-content h4 {
            font-size: 16px;
            color: #333;
            margin: 0 0 5px;
        }

        .notification-content p {
            font-size: 14px;
            color: #666;
            margin: 0;
            line-height: 1.5;
        }

        .notification-timestamp {
            font-size: 12px;
            color: #999;
        }

        .mark-read-btn {
            padding: 8px 12px;
            font-size: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .mark-read-btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <!-- Header -->
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

    <!-- Notifications Section -->
    <div class="notifications-container">
        <h1>My Messages</h1>
        
        <!-- Notification Item 1 -->
        <div class="notification-item">
            <div class="notification-content">
                <h4>Order Delivered</h4>
                <p>Your order #123456 has been successfully delivered. Thank you for shopping with us!</p>
            </div>
        </div>

        <!-- Notification Item 2 -->
        <div class="notification-item">
            <div class="notification-content">
                <h4>Payment Confirmation</h4>
                <p>Your payment for order #123457 has been confirmed. We are now processing your order.</p>
            </div>
        </div>

        <!-- Notification Item 3 -->
        <div class="notification-item">
            <div class="notification-content">
                <h4>Account Alert</h4>
                <p>There was a login attempt from a new device. If this was not you, please update your password immediately.</p>
            </div>
        </div>
    </div>
</body>
</html>
