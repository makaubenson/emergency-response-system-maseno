function openSuccessModal() {
  $("#successModal").modal("show");
}

document
  .getElementById("success-Button")
  .addEventListener("click", function (e) {
    e.preventDefault();
    openSuccessModal();
  });
