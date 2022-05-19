function openSuccessModal() {
  $("#successModal").modal("show");
}

document
  .getElementById("success-Button")
  .addEventListener("click", function (e) {
    e.preventDefault();
    openSuccessModal();
  });

function openFailedModal() {
  $("#failedModal").modal("show");
}
document
  .getElementById("failed-Button")
  .addEventListener("click", function (e) {
    e.preventDefault();
    openFailedModal();
  });

