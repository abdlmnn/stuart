<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Line - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            background-color: #fafafa;
            color: #333;
        }

        header {
            background-color: #111;
            padding: 1em 2em;
            text-align: center;
            color: #fff;
        }

        header h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        nav ul {
            display: flex;
            justify-content: center;
            gap: 30px;
            list-style: none;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #E2A500; /* Highlight color */
        }

        .hero-section {
            background: url('images/bg4.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
        }

        .hero-section h2 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .hero-section .cta-btn {
            padding: 12px 30px;
            background-color: #E2A500;
            color: #fff;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .hero-section .cta-btn:hover {
            background-color: #111;
        }

        .item-container {
            width: 100%;
            max-width: 1200px;
            /* max-width: 1450px; */
            margin: 7em auto 2em auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px; 
            justify-content: center; 
            align-items: start;
        }

        .item-container .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-content: space-between;
            height: 310px;
            padding: 0.5em;
        }

        .item-container .card:hover{
            background-color: #dfdada52;
        }

        .item-container .card .card-image {
            width: 100%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin: auto;
        }

        .item-container .card .card-image .image-item {
            width: 175px;
            position: absolute;
            z-index: 1;
        }

        .item-container .card .description-container {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-top: 1em;
        }

        .item-container .card .description-container .item-name {
            font-size: 1rem;
            margin-bottom: 0.3em;
        }

        .item-container .card .description-container .item-price {
            font-weight: 500;
            color: #efaf00;
        }

        .item-container .card .description-container .add-to-cart {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .item-container .card .description-container .add-to-cart .cart-logo {
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .item-container .card .description-container .add-to-cart .cart-logo:hover {
            color: #efaf00;
        }


        @media (max-width: 768px) {
            .item-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            }

            .item-container .card {
                width: 100%; 
            }
        }



        footer {
            background-color: #111;
            color: #fff;
            text-align: center;
            padding: 20px 10px;
        }

        footer .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        footer .footer-links li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        footer .footer-links li a:hover {
            color: #E2A500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section h2 {
                font-size: 2.5rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            footer .footer-links {
                flex-direction: column;
            }
        }

    </style>
</head>
<body>

<header>
    <h1>Stuart Boutique</h1>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
        </ul>
    </nav>
</header>

<section class="hero-section">
    <div>
        <h2>Explore Our Latest Fashion</h2>
        <p>Find the perfect outfit for any occasion</p>
        <button class="cta-btn">Shop Now</button>
    </div>
</section>

<div class="item-container">
        <div class="card">

            <div class="card-image">
                <img src="images/shoes3.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Red Sneaker</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt2.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt3.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shoes2.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Air Force Ones Nike Air</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt2.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt3.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shoes1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Shoes</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>
        
    </div>


<footer>
    <p>&copy; <?php echo date('Y') ?> Stuart Boutique</p>
    <ul class="footer-links">
    <?php if (isset($_SESSION['authenticated'])): ?>
        <li>
            <a href="<?= base_url('view-customer.php') ?>">
                <i class="fas fa-home"></i> 
                    Home
            </a>
        </li>
        <li>
            <a href="<?= base_url('shop.php') ?>">
                <i class="fa-solid fa-bag-shopping"></i> 
                    Shopping
            </a>
        </li>
    <?php endif; ?>
        <li>
            <a href="https://www.facebook.com/profile.php?id=100064031860548" target="_blank">
                <i class="fa-brands fa-facebook"></i> 
                    Facebook
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa-solid fa-location-dot"></i>
                    Torallba St. Poblacion, Iligan City
                </a>
            </li>
        <li>
            <a href="">
                <i class="fa-solid fa-phone"></i>
                    (063) 221 3543
            </a>
        </li>
    </ul>
</footer>

</body>
</html>
