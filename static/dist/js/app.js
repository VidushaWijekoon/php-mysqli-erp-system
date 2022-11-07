$(function () {
  $("#example1")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#example1_wrapper .col-md-6:eq(0)");
  $("#example2").DataTable({
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
  });
});

setTimeout(function () {
  if ($("#msg").length > 0) {
    $("#msg").remove();
  }
}, 10000);

$(function () {
  var dtToday = new Date();

  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if (month < 10) month = "0" + month.toString();
  if (day < 10) day = "0" + day.toString();

  var maxDate = year + "-" + month + "-" + day;

  // or instead:
  // var maxDate = dtToday.toISOString().substr(0, 10);

  // alert(maxDate);
  $("#visa_expiring_date").attr("min", maxDate);
  $("#passport_expiring_date").attr("min", maxDate);
  $("#select_delivery_date").attr("min", maxDate);
});

$(document).ready(function () {
  $("#showpassword").click(function () {
    if ($("#showpassword").is(":checked")) {
      $("#password").attr("type", "text");
    } else {
      $("#password").attr("type", "password");
    }
  });
});

$(function () {
  var start = moment().subtract(29, "days");
  var end = moment();

  function cb(start, end) {
    $("#reportrange span").html(
      start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
    );
  }

  $("#reportrange").daterangepicker(
    {
      startDate: start,
      endDate: end,
      ranges: {
        Today: [moment(), moment()],
        Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
        "Last 7 Days": [moment().subtract(6, "days"), moment()],
        "Last 30 Days": [moment().subtract(29, "days"), moment()],
        "This Month": [moment().startOf("month"), moment().endOf("month")],
        "Last Month": [
          moment().subtract(1, "month").startOf("month"),
          moment().subtract(1, "month").endOf("month"),
        ],
      },
    },
    cb
  );

  cb(start, end);
});

// // When the user clicks on div, open the popup
// function myFunction() {
//   var popup = document.getElementById("myPopup");
//   popup.classList.toggle("show");
// }

// // When the user clicks on div, open the popup
// // R1A
// function myFunctionR1A1() {
//   var popup = document.getElementById("myPopupR1A1");
//   popup.classList.toggle("show");
// }

// function myFunctionR1A2() {
//   var popup = document.getElementById("myPopupR1A2");
//   popup.classList.toggle("show");
// }

// function myFunctionR1A3() {
//   var popup = document.getElementById("myPopupR1A3");
//   popup.classList.toggle("show");
// }

// function myFunctionR1A4() {
//   var popup = document.getElementById("myPopupR1A4");
//   popup.classList.toggle("show");
// }

// function myFunctionR1A5() {
//   var popup = document.getElementById("myPopupR1A5");
//   popup.classList.toggle("show");
// }

// // R1B
// function myFunctionR1B1() {
//   var popup = document.getElementById("myPopupR1B1");
//   popup.classList.toggle("show");
// }

// function myFunctionR1B2() {
//   var popup = document.getElementById("myPopupR1B2");
//   popup.classList.toggle("show");
// }

// function myFunctionR1B3() {
//   var popup = document.getElementById("myPopupR1B3");
//   popup.classList.toggle("show");
// }

// function myFunctionR1B4() {
//   var popup = document.getElementById("myPopupR1B4");
//   popup.classList.toggle("show");
// }

// function myFunctionR1B5() {
//   var popup = document.getElementById("myPopupR1B5");
//   popup.classList.toggle("show");
// }

// // R1C
// function myFunctionR1C1() {
//   var popup = document.getElementById("myPopupR1C1");
//   popup.classList.toggle("show");
// }

// function myFunctionR1C2() {
//   var popup = document.getElementById("myPopupR1C2");
//   popup.classList.toggle("show");
// }

// function myFunctionR1C3() {
//   var popup = document.getElementById("myPopupR1C3");
//   popup.classList.toggle("show");
// }

// function myFunctionR1C4() {
//   var popup = document.getElementById("myPopupR1C4");
//   popup.classList.toggle("show");
// }

// function myFunctionR1C5() {
//   var popup = document.getElementById("myPopupR1C5");
//   popup.classList.toggle("show");
// }

// // R1C
// function myFunctionR1C1() {
//   var popup = document.getElementById("myPopupR1C1");
//   popup.classList.toggle("show");
// }

// function myFunctionR1C2() {
//   var popup = document.getElementById("myPopupR1C2");
//   popup.classList.toggle("show");
// }

// function myFunctionR1C3() {
//   var popup = document.getElementById("myPopupR1C3");
//   popup.classList.toggle("show");
// }

// function myFunctionR1C4() {
//   var popup = document.getElementById("myPopupR1C4");
//   popup.classList.toggle("show");
// }

// // R1D
// function myFunctionR1D1() {
//   var popup = document.getElementById("myPopupR1D1");
//   popup.classList.toggle("show");
// }

// function myFunctionR1D2() {
//   var popup = document.getElementById("myPopupR1D2");
//   popup.classList.toggle("show");
// }

// function myFunctionR1D3() {
//   var popup = document.getElementById("myPopupR1D3");
//   popup.classList.toggle("show");
// }

// function myFunctionR1D4() {
//   var popup = document.getElementById("myPopupR1D4");
//   popup.classList.toggle("show");
// }

// function myFunctionR1D5() {
//   var popup = document.getElementById("myPopupR1D5");
//   popup.classList.toggle("show");
// }
