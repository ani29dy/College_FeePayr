var show = document.querySelector(".show");
var view = document.querySelector(".view");

show.addEventListener("click", () => {
  view.classList.toggle("view-2");
});

var show_2 = document.querySelector(".show-1");
var view_2 = document.querySelector(".view-1");

show_2.addEventListener("click", () => {
  view_2.classList.toggle("view-3");
});