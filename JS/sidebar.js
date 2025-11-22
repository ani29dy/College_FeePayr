const shrink_btn = document.querySelector(".shrink-btn");
const sidebar_links = document.querySelectorAll(".sidebar-links a");
const active_tab = document.querySelector(".active-tab");
const staff = document.querySelector(".staff");
const staff_close = document.querySelector(".staff-close");

const course = document.querySelector(".course");
const course_close = document.querySelector(".course-close");

const left = document.querySelector(".left");
const course_left = document.querySelector(".course_left");

let activeIndex;

shrink_btn.addEventListener("click", () => {
  document.body.classList.toggle("shrink");

  shrink_btn.classList.add("hovered");

  setTimeout(() => {
    shrink_btn.classList.remove("hovered");
  }, 500);
});

// setTimeout(moveActiveTab, 400);
// function moveActionTab() {
//   let topPosition = activeIndex * 58 + 2.5;
//   active_tab.style.top = `${topPosition}px`;
// }

function changeLink() {
  sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
  this.classList.add("active");

  activeIndex = this.dataset.active;

  moveActionTab();
}
sidebar_links.forEach((link) => link.addEventListener("click", changeLink));

staff.addEventListener("click", () => {
  staff_close.classList.toggle("staff-view");
  left.classList.toggle("up");
});

course.addEventListener("click", () => {
  course_close.classList.toggle("course-view");
  course_left.classList.toggle("up");
});
