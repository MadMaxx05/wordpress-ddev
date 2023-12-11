const header = document.querySelector("header");
const menuButton = document.getElementById("menu-button");
const iconElements = menuButton.querySelectorAll("span");

menuButton.addEventListener("click", () => {
  document.body.classList.toggle("overflow-hidden");

  header.classList.toggle("bg-white/80");
  header.classList.toggle("bg-white");

  header.querySelector("ul").classList.toggle("translate-x-full");

  iconElements[0].classList.toggle("rotate-45");
  iconElements[0].classList.toggle("translate-y-[5px]");
  iconElements[1].classList.toggle("-rotate-45");
  iconElements[1].classList.toggle("-translate-y-[5px]");
});
