// Nav bar
let navElement = document.querySelector("nav");
window.onscroll = function () {
    if (window.scrollY >= 10) {
        navElement.classList.add("border-bottom");
        navElement.classList.add("shadow");
    } else {
        navElement.classList.remove("border-bottom");
        navElement.classList.remove("shadow");
    }
};

//ScrollReveal
var fadeIn = {
    duration: 1500,
    delay: 100,
    easing: "ease",
};
var fadeInFast = {
    duration: 800,
    delay: 100,
    easing: "ease",
};
var fadeTop = {
    distance: "20%",
    origin: "top",
};
var fadeLeft = {
    distance: "20%",
    origin: "left",
};
var fadeRight = {
    distance: "20%",
    origin: "right",
};
var fadeBottom = {
    distance: "20%",
    origin: "bottom",
};

ScrollReveal().reveal(".home-text", fadeIn);
ScrollReveal().reveal(".home-text", fadeBottom);

ScrollReveal().reveal(".home-product-text", fadeInFast);
ScrollReveal().reveal(".fade-left", fadeLeft);
ScrollReveal().reveal(".fade-right", fadeRight);


let expandElements = document.querySelectorAll(".filter-item");
expandElements.forEach((div) => {
    let expandDiv = div.querySelector(".expand")
    let expandIcon = div.querySelector(".expand-icon");
    div.addEventListener("click", () => {
        expandIcon.classList.toggle("rotate180");
    })
})
