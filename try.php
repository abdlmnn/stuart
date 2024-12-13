<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Modal</title>
  <style>
    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1050;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.2);
      justify-content: center;
      align-items: center;
      /* border: 1px solid red; */
    }

    .modal-dialog {
      background: #fff;
      /* border-radius: 8px; */
      overflow: hidden;
      max-width: 700px; /* Reduced width */
      width: 90%;
      /* border: 1px solid red; */
    }

    .modal-body {
      display: flex;
      /* padding: 15px; Reduced padding */
      padding: 0px;
      gap: 15px;
    }

    /* Product Modal Container */
    .product-modal-container {
      display: flex;
      gap: 15px; /* Reduced gap */
      width: 100%;
    }

    /* Left Section: Images */
    .product-images {
      width: 40%;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .image-main img {
      width: 100%;
      border-radius: 8px;
    }

    /* Right Section: Details */
    .product-details {
      width: 60%;
      /* border: 1px solid red; */
    }

    .product-brand {
      font-weight: bold;
      color: #007bff;
      /* border: 1px solid red; */
    }

    .product-title {
      font-size: 1.2rem;
      margin: 5px 0;
      /* border: 1px solid red; */
    }

    .product-sku {
      font-size: 0.9rem;
      color: #666;
    }

    .product-price {
      font-size: 1.5rem;
      margin: 10px 0;
    }

    .current-price {
      color: #e63946;
      font-weight: bold;
    }

    .product-sizes h6 {
      font-weight: bold;
    }

    .size-options {
      display: flex;
      gap: 10px;
      margin: 10px 0;
    }

    .size-btn {
      border: 1px solid #ddd;
      padding: 5px 10px;
      border-radius: 4px;
      background-color: #fff;
      cursor: pointer;
      transition: 0.3s;
    }

    .size-btn:hover {
      background-color: #007bff;
      color: #fff;
    }

    .size-btn.disabled {
      cursor: not-allowed;
      opacity: 0.5;
    }

    .almost-sold-out {
      color: #e63946;
      font-size: 0.9rem;
    }

    .add-to-cart {
      width: 100%;
      padding: 10px;
      background-color: #000;
      color: #fff;
      border-radius: 4px;
      text-align: center;
      cursor: pointer;
    }

    .add-to-cart:hover {
      background-color: #333;
    }

    @media (max-width: 786px) {
        .product-images {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-title {
            font-size: 1rem;
            margin: 5px 0;
            border: 1px solid red;
        }
    }
  </style>
</head>
<body>
  <!-- Modal Trigger -->
  <button id="openModal" class="btn">View Product</button>

  <!-- Modal -->
  <div id="productModal" class="modal">
    <div class="modal-dialog">
      <div class="modal-body">
        <div class="product-modal-container">
          <!-- Left Section: Images -->
          <div class="product-images">
            <div class="image-main">
              <img src="images/shoes1.png" alt="Main Product Image">
            </div>
          </div>

          <!-- Right Section: Details -->
          <div class="product-details">
            <h5 class="product-brand">Top / Men</h5>
            <p class="product-title">Black T-shirt</p>
            <p class="product-sku">25 items left</p>
            <div class="product-price">
              <span class="current-price">₱5,660</span>
            </div>
            <div class="product-sizes">
              <h6>Size</h6>
              <div class="size-options">
                <button class="size-btn">S</button>
                <button class="size-btn">M</button>
                <button class="size-btn">L</button>
                <button class="size-btn">XL</button>
                <button class="size-btn disabled">XXXL</button>
              </div>
              <p class="almost-sold-out">Hurry! Almost Sold Out...</p>
            </div>
            <div class="add-to-cart">ADD TO CART</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // JavaScript to toggle modal visibility
    const modal = document.getElementById('productModal');
    const openModal = document.getElementById('openModal');

    openModal.addEventListener('click', () => {
      modal.style.display = 'flex';
    });

    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.style.display = 'none';
      }
    });
  </script>
</body>
</html>
