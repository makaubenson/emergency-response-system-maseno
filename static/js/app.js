document.getElementById("year").innerHTML = new Date().getFullYear();

document.addEventListener("DOMContentLoaded", function (event) {
  event.preventDefault();
  Toastify({
    text: "You have Successfully Logged In ",
    className: "success",
    style: {
      background: "#28a745",
      color: "white",
    },
  }).showToast();
});
