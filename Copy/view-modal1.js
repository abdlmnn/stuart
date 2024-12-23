const viewModal = document.getElementById('viewModal');
const itemModal = document.getElementById('itemModal');

viewModal.addEventListener('click', () => {

    itemModal.style.display = 'flex';
});

window.addEventListener('click', (e) => {

    if(e.target === itemModal){
        itemModal.style.display = 'none';
    }
});
