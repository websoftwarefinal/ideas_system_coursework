// Set up variables
let nav = document.querySelector("nav ul");
let burger = document.querySelector(".burgerMenu");

// Click Controls
burger.addEventListener("click", ()=> {
    burger.classList.toggle("active");
    nav.classList.toggle("active");
})

// Remove Menu when clicking on an object
document.querySelectorAll("nav ul li").forEach(n => n.addEventListener("click", () => {
    burger.classList.remove("active");
    nav.classList.remove("active");
}))