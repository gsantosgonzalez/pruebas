<!DOCTYPE html>
<html lang = "en">
    <head>
        <style>
            #map{
            height: 80%;
            }
        </style>
    </head>
    <body>
      <div id="map"></div>
      <script>
        function initMap() {
          var chicago = {lat: 41.85, lng: -87.65};
          var indianapolis = {lat: 39.79, lng: -86.14};

          var map = new google.maps.Map(document.getElementById('map'), {
            center: chicago,
            scrollwheel: false,
            zoom: 7
          });

          var directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
          });

          // Set destination, origin and travel mode.
          var request = {
            destination: indianapolis,
            origin: chicago,
            travelMode: 'DRIVING'
          };

          // Pass the directions request to the directions service.
          var directionsService = new google.maps.DirectionsService();
          directionsService.route(request, function(response, status) {
            if (status == 'OK') {
              // Display the route on the map.
              directionsDisplay.setDirections(response);
            }
          });
        }

      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ_Fw6bkQbbBxQMb1P72PSMST_bFADblc&callback=initMap"
          async defer></script>
    </body>
</html>