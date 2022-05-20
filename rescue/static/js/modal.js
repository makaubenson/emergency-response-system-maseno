function openFailedModal() {
  $("#failedModal").modal("show");
}
document
  .getElementById("failed-Button")
  .addEventListener("click", function (e) {
    e.preventDefault();
    openFailedModal();
  });

function openSuccessModal() {
  $("#successModal").modal("show");
}
let elements = document.querySelectorAll(".success-button");
elements.forEach(function (element) {
  element.addEventListener("click", function (e) {
    e.preventDefault();
    let button_id = element.dataset.id;
    console.log(button_id);
    document.getElementById("code-value").value = button_id;
    openSuccessModal();
  });
});
