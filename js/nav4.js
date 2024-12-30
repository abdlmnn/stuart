const modal = document.querySelector(".modal-content-navbar");
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