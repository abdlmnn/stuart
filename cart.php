<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.modal {
  position: fixed; 
  z-index: 1;
  right: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  max-width: 450px;
  overflow: auto; 
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 90%;
  height: 100%;
  max-width: 600px; 
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  position: relative;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* Cart Item List */
.cart-items {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.cart-items li {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 0;
  border-bottom: 1px solid #ddd;
}

.cart-items li:last-child {
  border-bottom: none;
}

.cart-item img {
  max-width: 50px;
  margin-right: 10px;
}

.cart-item {
  display: flex;
  align-items: center;
}

.quantity-controls {
  display: flex;
  align-items: center;
  gap: 10px;
}

.quantity-controls button {
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  cursor: pointer;
}

.quantity-controls button:hover {
  background-color: #45a049;
}

.cart-actions {
  text-align: center;
  margin-top: 20px;
}

.cart-actions button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.cart-actions button:hover {
  background-color: #45a049;
}

.total-price {
  text-align: right;
  font-size: 18px;
  font-weight: bold;
  margin-top: 10px;
}

/* Right-aligned modal */
.modal-content {
  margin-left: auto;
  margin-right: 0;
}
</style>
</head>
<body>

<h2>Responsive Add to Cart Modal</h2>

<!-- Trigger/Open The Modal -->
<button id="cartBtn">Open Cart</button>

<!-- The Modal -->
<div id="cartModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Your Cart</h2>
    <ul class="cart-items">
      <li>
        <div class="cart-item">
          <img src="https://via.placeholder.com/50" alt="Item 1">
          <span>Item 1</span>
        </div>
        <div class="quantity-controls">
          <button class="decrease">-</button>
          <span class="quantity">1</span>
          <button class="increase">+</button>
        </div>
        <span class="price" data-price="10">$10.00</span>
      </li>
      <li>
        <div class="cart-item">
          <img src="https://via.placeholder.com/50" alt="Item 2">
          <span>Item 2</span>
        </div>
        <div class="quantity-controls">
          <button class="decrease">-</button>
          <span class="quantity">1</span>
          <button class="increase">+</button>
        </div>
        <span class="price" data-price="15">$15.00</span>
      </li>
      <li>
        <div class="cart-item">
          <img src="https://via.placeholder.com/50" alt="Item 3">
          <span>Item 3</span>
        </div>
        <div class="quantity-controls">
          <button class="decrease">-</button>
          <span class="quantity">1</span>
          <button class="increase">+</button>
        </div>
        <span class="price" data-price="20">$20.00</span>
      </li>
    </ul>
    <div class="total-price">Total: $45.00</div>
    <div class="cart-actions">
      <button id="checkoutBtn">Proceed to Checkout</button>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("cartModal");

// Get the button that opens the modal
var btn = document.getElementById("cartBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Update total price dynamically
function updateTotalPrice() {
  const prices = document.querySelectorAll(".price");
  let total = 0;
  prices.forEach(price => {
    const unitPrice = parseFloat(price.getAttribute("data-price"));
    const quantity = parseInt(price.previousElementSibling.querySelector(".quantity").innerText);
    total += unitPrice * quantity;
  });
  document.querySelector(".total-price").innerText = `Total: $${total.toFixed(2)}`;
}

// Add event listeners to increase and decrease buttons
const increaseButtons = document.querySelectorAll(".increase");
const decreaseButtons = document.querySelectorAll(".decrease");

increaseButtons.forEach(button => {
  button.addEventListener("click", function() {
    const quantitySpan = this.previousElementSibling;
    let quantity = parseInt(quantitySpan.innerText);
    quantity++;
    quantitySpan.innerText = quantity;
    updateTotalPrice();
  });
});

decreaseButtons.forEach(button => {
  button.addEventListener("click", function() {
    const quantitySpan = this.nextElementSibling;
    let quantity = parseInt(quantitySpan.innerText);
    if (quantity > 1) {
      quantity--;
      quantitySpan.innerText = quantity;
      updateTotalPrice();
    }
  });
});
</script>

</body>
</html>