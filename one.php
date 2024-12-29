<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1.5em;
        }

        .content {
            padding: 20px;
        }

        .order-details {
            margin-bottom: 20px;
        }

        .order-details h3 {
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .order-details p {
            margin: 5px 0;
            color: #555;
        }

        .total {
            font-size: 1.2em;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background: #f9f9f9;
        }

        .actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        .actions .cancel {
            background: #f44336;
            color: white;
        }

        .actions .confirm {
            background: #4CAF50;
            color: white;
        }

        .actions button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Confirm Your Order
        </div>
        <div class="content">
            <div class="order-details">
                <h3>Order Summary</h3>
                <p><strong>Item:</strong> Fashion Shoes</p>
                <p><strong>Quantity:</strong> 2</p>
                <p><strong>Price per item:</strong> $50</p>
                <p class="total">Total: $100</p>
            </div>
        </div>
        <div class="actions">
            <button class="cancel">Cancel</button>
            <button class="confirm">Confirm Order</button>
        </div>
    </div>
</body>
</html>
