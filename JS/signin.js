const studentsignin = document.querySelector("#studentsignin");
const clerksignin = document.querySelector("#clerksignin");
const container = document.querySelector(".container");

clerksignin.addEventListener('click', () => {
    container.classList.add("sign-in-mode");
})

studentsignin.addEventListener('click', () => {
    container.classList.remove("sign-in-mode");
})