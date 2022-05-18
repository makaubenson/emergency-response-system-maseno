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
        console.log(userLocation);
        //Update Longitude Values on Student Dashboard
        document.getElementById("js-longitude").innerHTML = userLocation.lng;
        document.getElementById("js-latitude").innerHTML = userLocation.lat;

        //Update Lat and Long on Form
        document.querySelector(".student-longitude").value = userLocation.lng;
        document.querySelector(".student-latitude").value = userLocation.lat;
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
            "Could Not Get Your Location,Ensure You Have An Active Intenet Connection",
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
