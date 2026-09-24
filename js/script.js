const menuButton = document.querySelector(".header__menu-toggle");
const navigation = document.querySelector(".header__nav");
function setMenu(open) {
  navigation.classList.toggle("header__nav--open", open);
  menuButton.classList.toggle("header__menu-toggle--open", open);
  menuButton.setAttribute("aria-expanded", String(open));
  menuButton.setAttribute("aria-label", open ? "Закрыть меню" : "Открыть меню");
}

menuButton.addEventListener("click", () => {
  setMenu(!navigation.classList.contains("header__nav--open"));
});

navigation.addEventListener("click", (event) => {
  if (event.target.closest("a")) {
    setMenu(false);
  }
});

document.addEventListener("keydown", (event) => {
  if (event.key === "Escape") {
    setMenu(false);
  }
});

window.addEventListener("resize", () => {
  if (window.innerWidth > 880) {
    setMenu(false);
  }
});
