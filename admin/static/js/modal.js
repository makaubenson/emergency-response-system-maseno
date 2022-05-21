function openTaskViewModal() {
  $("#taskViewModal").modal("show");
}

let buttons = document.querySelectorAll(".taskViewButton");
buttons.forEach(function (button) {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    let helpcode = button.dataset.helpcode;
    let student_name = button.dataset.name;
    let student_phone = button.dataset.phone;
    let request_status = button.dataset.status;
    let adminID = button.dataset.adminid;
    let adminName = button.dataset.adminname;
    let adminDescription = button.dataset.description;

    document.getElementById("sHelpCode").value = helpcode;
    document.getElementById("sName").value = student_name;
    document.getElementById("sPhone").value = student_phone;
    document.getElementById("sRequestStatus").value = request_status;
    document.getElementById("adminID").value = adminID;
    document.getElementById("adminName").value = adminName;
    document.getElementById("rDescription").value = adminDescription;
    openTaskViewModal();
  });
});
