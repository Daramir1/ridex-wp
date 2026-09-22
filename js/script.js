const menuButton = document.querySelector(".header__menu-toggle");
const navigation = document.querySelector(".header__nav");
const bookingForm = document.querySelector("#booking-form");
const successMessage = document.querySelector("#success-message");
const newBookingButton = document.querySelector("#new-booking");

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

bookingForm.addEventListener("submit", (event) => {
  event.preventDefault();
  bookingForm.reset();
  bookingForm.hidden = true;
  successMessage.hidden = false;
  successMessage.focus({ preventScroll: true });
});

newBookingButton.addEventListener("click", () => {
  successMessage.hidden = true;
  bookingForm.hidden = false;
  bookingForm.querySelector("input").focus();
});
