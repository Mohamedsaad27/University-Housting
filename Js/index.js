var hamburger = document.querySelector(".hamburger");
hamburger.addEventListener("click",function(){
    document.querySelector("body").classList.toggle("active");
})

let subMenu = document.getElementById("subMenu")
function toggleMenu() {
    subMenu.classList.toggle("open-menu");
}