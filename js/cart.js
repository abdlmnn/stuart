const cartOpen = document.getElementById('cartOpen');
const cartClose = document.getElementById('cartClose');
const cartContainer = document.getElementById('cartContainer');
const quantityButtons = document.querySelectorAll('.quantity-button');

cartOpen.onclick = () => {
    cartContainer.classList.add('show-cart-container');
};

cartClose.onclick = () => {
    cartContainer.classList.remove('show-cart-container');
};

quantityButtons.forEach(button => {
    button.addEventListener('click', event => {
        const quantityDisplay = event.target.parentNode.querySelector('.quantity-display');
        let currentQuantity = parseInt(quantityDisplay.textContent);

        if (event.target.classList.contains('plus')) {
            currentQuantity += 1;
        } else if (event.target.classList.contains('minus')) {
            currentQuantity = currentQuantity > 1 ? currentQuantity - 1 : 1;
        }

        quantityDisplay.textContent = currentQuantity;
    });
});