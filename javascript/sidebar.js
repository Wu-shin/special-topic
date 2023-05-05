const openBtn = document.querySelector(".open-btn");
const closeBtn = document.querySelector(".close-btn");
const sidebar = document.querySelector(".sidebar");
// const dark = document.querySelector(".dark");
openBtn.addEventListener("click", function () {
    sidebar.classList.toggle("show-sidebar");
});
closeBtn.addEventListener("click", function () {
    sidebar.classList.remove("show-sidebar");
});
// dark.addEventListener("click", function () {
//     sidebar.classList.remove("show-sidebar");
// });
