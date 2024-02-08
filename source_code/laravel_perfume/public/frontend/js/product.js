let expandElements = document.querySelectorAll(".filter-item");
expandElements.forEach((div) => {
    let expandDiv = div.querySelector(".expand")
    let expandIcon = div.querySelector(".expand-icon");
    div.addEventListener("click", () => {
        expandIcon.classList.toggle("rotate180");
    })
})
