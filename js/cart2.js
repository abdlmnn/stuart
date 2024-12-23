const cartContainer = document.getElementById('cartContainer');

function cartOpen() {
    cartContainer.classList.add('show-cart-container');
}

function cartClose() {
    cartContainer.classList.remove('show-cart-container');
}