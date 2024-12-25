<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            font-size: 18px;
            text-align: center;
        }

        .cart {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .cart-items {
            flex: 3;
            background: #fff;
            padding: 20px;
            /* border-radius: 5px; */
        }

        .order-summary {
            flex: 1;
            background: #fff;
            padding: 20px;
            margin-left: 20px;
            /* border-radius: 5px; */
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .cart-item img {
            width: 100px;
            height: auto;
            /* border-radius: 5px; */
        }

        .cart-item-details {
            flex: 1;
            margin-left: 20px;
        }

        .cart-item-price {
            font-weight: bold;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-item-quantity input {
            width: 50px;
            text-align: center;
            padding: 5px;
            border: 1px solid #ccc;
            /* border-radius: 3px; */
        }

        .cart-item-actions button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            /* border-radius: 3px; */
            cursor: pointer;
        }

        .order-summary h3 {
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .checkout-btn {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            border: none;
            font-size: 16px;
            cursor: pointer;
            /* border-radius: 5px; */
            width: 100%;
        }

        .delete-all {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            /* border-radius: 5px; */
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Shopping Cart</div>

        <div class="cart">
            <div class="cart-items">
                <h2>All Items (2)</h2>
                <div class="cart-item">
                    <img src="https://via.placeholder.com/100" alt="Product Image">
                    <div class="cart-item-details">
                        <h4>Sweetra Women's Halter Neck</h4>
                        <p>Multicolor / S</p>
                        <div class="cart-item-quantity">
                            <label for="quantity1">Qty:</label>
                            <input type="number" id="quantity1" value="1" min="1">
                        </div>
                        <div class="cart-item-price">₱395</div>
                    </div>
                    <div class="cart-item-actions">
                        <button>Delete</button>
                    </div>
                </div>
                <div class="cart-item">
                    <img src="https://via.placeholder.com/100" alt="Product Image">
                    <div class="cart-item-details">
                        <h4>Nike 2024 Pullover Hoodie</h4>
                        <p>Green / M</p>
                        <div class="cart-item-quantity">
                            <label for="quantity2">Qty:</label>
                            <input type="number" id="quantity2" value="1" min="1">
                        </div>
                        <div class="cart-item-price">₱5,660</div>
                    </div>
                    <div class="cart-item-actions">
                        <button>Delete</button>
                    </div>
                </div>
                <button class="delete-all">Delete All</button>
            </div>

            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="summary-line">
                    <span>Retail Price:</span>
                    <span>₱8,948</span>
                </div>
                <div class="summary-line">
                    <span>Promotions:</span>
                    <span>-₱938</span>
                </div>
                <div class="summary-line">
                    <span>Coupon:</span>
                    <span>-₱375</span>
                </div>
                <div class="summary-line">
                    <span><strong>Estimated Price:</strong></span>
                    <span><strong>₱7,635</strong></span>
                </div>
                <button class="checkout-btn">Checkout Now</button>
            </div>
        </div>
    </div>
</body>
</html>
