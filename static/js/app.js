document.getElementById("year").innerHTML = new Date().getFullYear();
let userLocation = {};

function getCurrentLocationHandler(e) {
  if (navigator && navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (pos) => {
        const coords = pos.coords;

        userLocation = {
          present: true,
          lat: coords.latitude,
          lng: coords.longitude,
        };
        // console.log(userLocation);

        return;
      },
      (error) => {
        if (error.message.includes("denied")) {
          console.log({
            hasError: true,
            message:
              "Could Not Get Your Location, Permision To Access Your Device GPS Was Denied, Kindly Allow Access And Try Again",
          });

          handlePermission();
          return;
        }

        return console.log({
          hasError: true,
          message:
            "Could Not Get Your Location,Ensure You Have An Active Internet Connection",
        });
      }
    );
    return;
  }

  return console.log({
    hasError: true,
    message:
      "Could Not Get Your Location,Ensure You Are Using A GPS Enabled Device And Your Location Services Are Turned On",
  });
}
getCurrentLocationHandler();

document.addEventListener("DOMContentLoaded", function (event) {
  event.preventDefault();
  let student_latitude = 0;
  let student_longitude = 0;
  if (
    typeof student_latitude == "number" &&
    typeof student_longitude == "number"
  ) {
    student_latitude = document.getElementById("js-latitude").innerHTML =
      userLocation.lat;
    student_longitude = document.getElementById("js-longitude").innerHTML =
      userLocation.lng;
  } else if (
    typeof student_latitude == "undefined" &&
    typeof student_longitude == "undefined"
  ) {
    student_latitude = document.getElementById("js-latitude").innerHTML = 0;
    student_longitude = document.getElementById("js-longitude").innerHTML = 0;
  } else {
    student_latitude = document.getElementById("js-latitude").innerHTML = 0;
    student_longitude = document.getElementById("js-longitude").innerHTML = 0;
  }
});
