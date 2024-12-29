<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt Modal</title>
    <style>
        /* Modal container */
        .view-modal-container {
            display: none;
            position: fixed;
            /* border: 1px solid red; */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            overflow: auto;
            justify-content: center;
            align-items: center;
        }

        /* Modal content */
        .first-child-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            width: 85%;
            max-width: 700px; /* Reduced width */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            /* border: 1px solid red; */
        }

        /* Header */
        h2 {
            text-align: center;
            font-size: 20px; /* Reduced font size */
            margin-bottom: 15px;
        }

        /* User info */
        .user-info {
            margin-bottom: 15px;
            font-size: 14px; /* Smaller font size */
        }

        /* Order items container with scroll */
        .order-items {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
            max-height: 300px; /* Fixed height for scrolling */
            overflow-y: auto; /* Enable vertical scrolling */
            padding-right: 15px; /* Add space for scrollbar */
            /* border: 1px solid red; */
            padding: 25px;
        }

        /* Each order item */
        .order-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px; 
            /* border: 1px solid #ddd; */
            box-shadow: 0 0 15px 3px rgba(0,0,0,.1);
            /* border-radius: 8px; */
            /* background-color: #f9f9f9; */
            background-color: transparent;
            /* border: 1px solid red; */
        }

        .order-item img {
            width: 75px; /* Smaller image size */
            height: auto;
            object-fit: cover;
            margin-right: 20px; /* Reduced margin */
        }

        .order-item .item-details {
            flex: 1;
        }

        .order-item .item-details p {
            margin: 3px 0; /* Reduced margin */
            font-size: 14px; /* Smaller font size */
        }

        /* Total amount */
        .total-amount {
            margin-top: 15px;
            font-size: 16px; /* Smaller font size */
            font-weight: bold;
            text-align: right;
        }

        /* Close Button */
        .close-button {
            background-color: #f44336;
            color: white;
            padding: 8px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            display: block;
            width: 100%;
        }

        /* Responsive grid layout for larger screens */
        @media (min-width: 768px) {
            .order-items {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Modal Container -->
    <div id="itemModal" class="view-modal-container">
        <div class="first-child-container">
            <div class="second-child-container">
                <form action="" method="post">
                    <div class="item-modal-container">
                        <!-- View Modal Content -->
                        <h2>Order Receipt</h2>

                        <!-- User Information -->
                        <div class="user-info">
                            <p><strong>User Full Name:</strong> <span id="userFullName">John Doe</span></p>
                            <p><strong>Payment Method:</strong> <span id="paymentMethod">Credit Card</span></p>
                        </div>

                        <!-- Items List -->
                        <div class="order-items" id="orderItems">
                            <!-- Order items will be dynamically inserted here -->
                        </div>

                        <!-- Total Amount -->
                        <div class="total-amount">
                            <p><strong>Grand Total: </strong> <span id="grandTotal">$0.00</span></p>
                        </div>

                        <!-- Close Button -->
                        <button type="button" class="close-button" onclick="closeModal()">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Sample data for the order
        const orderData = {
            userFullName: "John Doe",
            paymentMethod: "Credit Card",
            items: [
                {
                    image: "images/shirt1.png", // Placeholder image
                    name: "T-Shirt",
                    size: "M",
                    price: 19.99,
                    quantity: 2,
                    total: 39.98
                },
                {
                    image: "images/shoes1.png", // Placeholder image
                    name: "Jeans",
                    size: "L",
                    price: 49.99,
                    quantity: 1,
                    total: 49.99
                },
                {
                    image: "images/shoes2.png", // Placeholder image
                    name: "Jeans",
                    size: "L",
                    price: 49.99,
                    quantity: 1,
                    total: 49.99
                },
                {
                    image: "images/PngItem_1801328.png", // Placeholder image
                    name: "Jeans",
                    size: "L",
                    price: 49.99,
                    quantity: 1,
                    total: 49.99
                },
                {
                    image: "images/shoes3.png", // Placeholder image
                    name: "Jeans",
                    size: "L",
                    price: 49.99,
                    quantity: 1,
                    total: 49.99
                },
                {
                    image: "images/shoes3.png", // Placeholder image
                    name: "Jeans",
                    size: "L",
                    price: 49.99,
                    quantity: 1,
                    total: 49.99
                },
                {
                    image: "images/shoes3.png", // Placeholder image
                    name: "Jeans",
                    size: "L",
                    price: 49.99,
                    quantity: 1,
                    total: 49.99
                }
            ]
        };

        // Function to open the modal
        function openModal() {
            // Populate the modal with the order data
            document.getElementById("userFullName").textContent = orderData.userFullName;
            document.getElementById("paymentMethod").textContent = orderData.paymentMethod;

            const orderItemsContainer = document.getElementById("orderItems");
            orderItemsContainer.innerHTML = ""; // Clear existing items

            let grandTotal = 0;

            // Loop through the order items and display them
            orderData.items.forEach(item => {
                grandTotal += item.total;
                const orderItem = `
                    <div class="order-item">
                        <img src="${item.image}" alt="${item.name}">
                        <div class="item-details">
                            <p><strong>${item.name}</strong></p>
                            <p>Size: ${item.size}</p>
                            <p>Price: $${item.price.toFixed(2)}</p>
                            <p>Quantity: ${item.quantity}</p>
                            <p>Total: $${item.total.toFixed(2)}</p>
                        </div>
                    </div>
                `;
                orderItemsContainer.innerHTML += orderItem;
            });

            // Update the grand total
            document.getElementById("grandTotal").textContent = `$${grandTotal.toFixed(2)}`;

            // Show the modal
            document.getElementById("itemModal").style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById("itemModal").style.display = "none";
        }

        // Example of opening the modal when an order is complete
        openModal(); // Call this when you want to open the modal, e.g., after order completion
    </script>

</body>
</html>





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .payment-container {
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .payment-header {
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .payment-header h1 {
            margin: 0;
            font-size: 24px;
            color: #5a5a5a;
        }

        .payment-header p {
            margin: 5px 0 0;
            color: #7d7d7d;
        }

        .payment-content {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Left section */
        .payment-left {
            width: 48%;
        }

        .payment-left h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .payment-left p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }

        .qr-code img {
            width: 100%;
            max-width: 200px;
            display: block;
            margin: 10px 0;
        }

        .payment-method img {
            width: 50%;
            display: block;
            margin: 10px 0;
        }

        .instruction {
            font-size: 12px;
            color: #999;
        }

        .how-to-pay {
            font-size: 14px;
            color: #007BFF;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        /* Right section */
        .payment-right {
            width: 48%;
        }

        .payment-right h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .payment-right p {
            font-size: 14px;
            color: #666;
            margin: 5px 0;
        }

        .total-to-pay {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .total-to-pay span {
            color: #e53935;
        }

        /* Image input styles */
        .image-upload {
            margin-top: 20px;
        }

        .image-upload input {
            font-size: 14px;
            padding: 10px;
            margin-top: 10px;
            width: 100%;
        }

    </style>
</head>
<body>
    <div class="payment-container">
        <div class="payment-header">
            <h1>Alipay+</h1>
            <p>Powers payments by your e-wallet</p>
        </div>

        <div class="payment-content">
            <!-- Left section -->
            <div class="payment-left">
                <h2>Scan QR Code to Pay </h2>
                <!-- <div class="qr-code">
                    <img src="placeholder-qr.png" alt="QR Code">
                </div> -->
                <div class="payment-method">
                    <img src="gcash/QRcode.jpg" alt="Gcash">
                </div>

                <div class="payment-method">
                    <h3>0961 093 9761</h3>
                </div>
                <!-- <p class="instruction">This QR code can be scanned once only</p>
                <a href="#" class="how-to-pay">How to Pay?</a> -->

                <!-- Image input for GCash proof -->
                <div class="image-upload">
                    <label for="gcash-proof">Upload your GCash Payment Proof</label>
                    <input type="file" id="gcash-proof" name="gcash-proof" accept="image/*">
                </div>
            </div>

            <!-- Right section -->
            <div class="payment-right">
                <h2>Order Summary</h2>
                <p><strong>Pay to:</strong> Stuart Boutique</p>
                <p><strong>Order info:</strong> SHEIN.COM</p>
                <p><strong>Order amount:</strong> PHP 400.00</p>
                <p class="total-to-pay"><strong>Total to pay:</strong> <span>PHP 400.00</span></p>
            </div>
        </div>
    </div>
</body>
</html> -->



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Method</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            font-size: 18px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .cash-summary-container {
            margin-top: 20px;
        }

        .cash-summary {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .main-cash-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #fff;
        }

        .payment-option img {
            height: 30px;
            margin-right: 10px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Method</h2>

        <div class="cash-summary-container">
            <h3 class="cash-summary">We Accept</h3>

            <div class="main-cash-container">
                <div class="payment-option">
                    <input type="radio" name="payment" id="cod" checked>
                    <label for="cod">
                        <img src="gcash/cod.png" alt="COD">
                        Cash On Delivery
                    </label>
                </div>

                <div class="payment-option">
                    <input type="radio" name="payment" id="gcash">
                    <label for="gcash">
                        <img src="gcash/gcash.png" alt="GCash">
                        GCash
                    </label>
                </div>
            </div>
        </div>
    </div>
</body>
</html> -->



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alipay+ Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            width: 80%;
            max-width: 800px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            padding: 20px;
            gap: 20px;
        }

        .left {
            flex: 1;
        }

        .right {
            width: 300px;
        }

        .qr-section {
            text-align: center;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
        }

        .qr-section img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
        }

        .order-summary {
            background-color: #fafafa;
            border-radius: 8px;
            padding: 15px;
            font-size: 14px;
            line-height: 1.6;
        }

        .order-summary h3 {
            margin: 0 0 10px 0;
        }

        .order-summary .total {
            font-size: 18px;
            font-weight: bold;
            color: #000;
        }

        .timer {
            font-size: 14px;
            color: #f44336;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h2>Scan QR Code to Pay</h2>
            <p>Scan the QR code with a mobile payment app supported by Alipay+</p>
            <div class="qr-section">
                <img src="qr-placeholder.png" alt="QR Code">
                <p>This QR code can be scanned once only</p>
            </div>
        </div>
        <div class="right">
            <div class="order-summary">
                <h3>Order Summary</h3>
                <p><strong>Pay to:</strong> SHEIN</p>
                <p><strong>Order info:</strong> SHEIN.COM</p>
                <p><strong>Order amount:</strong> PHP 20,571.00</p>
                <p><strong>Transaction no.:</strong> CGN241228201453617152</p>
                <p class="total">Total to pay: PHP 20,571.00</p>
                <p class="timer">Payment page expires in 13m 20s</p>
            </div>
        </div>
    </div>
</body>
</html> -->
