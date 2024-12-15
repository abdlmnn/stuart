<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneaker Product Page</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid red;
        }

        .product-image {
            float: left;
            width: 40%;
            margin-right: 20px;
        }

        .product-image img {
            width: 100%;
            height: auto;
        }

        .product-info {
            float: left;
            width: 50%;
        }

        .product-info h1 {
            margin-bottom: 10px;
        }

        .product-info p {
            margin-bottom: 15px;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .size-selector {
            margin-top: 20px;
        }

        .size-selector label {
            margin-right: 10px;
        }

        .quantity {
            margin-top: 20px;
        }

        .quantity input {
            width: 50px;
            text-align: center;
        }

        .add-to-cart {
            margin-top: 20px;
        }

        .add-to-cart button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="product-image">
            <img src="images/shirt2.png" alt="Sneaker Image">
        </div>

        <div class="product-info">
            <h1>Hook-And-Loop White Sneakers For Women</h1>
            <p>New Fashion Korean Style Casual Flat Streetwear Athletic Trainers</p>
            <p class="price">₱430</p>

            <div class="size-selector">
                <label for="size">Size:</label>
                <select id="size">
                    <option value="cn36">CN36</option>
                    <option value="cn37">CN37</option>
                    <option value="cn38">CN38</option>
                    <option value="cn39">CN39</option>
                    <option value="cn40">CN40</option>
                </select>
            </div>

            <div class="quantity">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" value="1" min="1">
            </div>

            <div class="add-to-cart">
                <button>ADD TO CART</button>
            </div>
        </div>

        <div class="clear"></div>
    </div>

</body>
</html>