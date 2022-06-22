const sideMenu =  document.querySelector("aside");
const menuBtn = document.querySelector("#menuBtn");
const closeBtn =  document.querySelector("#close-btn");

menuBtn.addEventListener('click', () =>{
    sideMenu.style.display = 'block';
})

closeBtn.addEventListener('click', () => {
    sideMenu.style.display ='none';
})

