const modal = document.querySelector(".modal-content");
const hamburger = document.querySelector(".hamburger");

function toggleModal() 
{
    if(modal.style.display === "flex"){
        modal.style.display = "none"; 
        hamburger.classList.remove("active"); 
    }else{
        modal.style.display = "flex"; 
        hamburger.classList.add("active"); 
    }
}

window.addEventListener("resize", () => {

    if(window.innerWidth > 768 && modal.style.display === "flex"){
        modal.style.display = "none"; 
        hamburger.classList.remove("active"); 
    }
});

const addToCartBtn = document.getElementById('addToCartBtn');
const addToCartModal = document.getElementById('addToCartModal');
const closeBtn = document.querySelector('.close');
const removeBtn = document.querySelector('.remove-btn');

addToCartBtn.addEventListener('click', () => {
  addToCartModal.classList.add('show');
});

closeBtn.addEventListener('click', () => {
  addToCartModal.classList.remove('show');
});