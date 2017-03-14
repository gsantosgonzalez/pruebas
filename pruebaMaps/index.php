    <!DOCTYPE html>
    <html>
    <head>
        <title>Simple click event</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
          }
          #map {
            float:left;
            height: 70%;
            width: 60%;
            margin: auto;
          }
          #results {
            float:left;
            height: 70%;
            width: 35%;
            margin: auto;
          }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <div id="results"></div>
        <button onclick="showResults()">Show Results</button>
            <script>
   
                var map;
                var infoWindow;
                var results = [];
                var resultsDiv = document.getElementById('results');
                var theURL = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670,151.1957&radius=500&types=food&name=cruise&key=AIzaSyBJ_Fw6bkQbbBxQMb1P72PSMST_bFADblc";

                var HttpClient = function() {
                    this.get = function(aUrl, aCallback) {
                        var anHttpRequest = new XMLHttpRequest();
                        anHttpRequest.onreadystatechange = function() { 
                            if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                                aCallback(anHttpRequest.responseText);
                        }

                        anHttpRequest.open( "GET", aUrl );
                        anHttpRequest.send( null );
                    }
                }

                function showResults(){
                    var client = new HttpClient();
                    client.get(theURL, function(response) {
                        resultsDiv.value = response;
                    });
                }

                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 5,
                        center: {lat: 24.886, lng: -70.268},
                        mapTypeId: google.maps.MapTypeId.TERRAIN
                    });

                    // Define the LatLng coordinates for the polygon.
                    var triangleCoords = [
                        {lat: 25.774, lng: -80.190},
                        {lat: 18.466, lng: -66.118},
                        {lat: 32.321, lng: -64.757}
                    ];

                    // Construct the polygon.
                    var bermudaTriangle = new google.maps.Polygon({
                    paths: triangleCoords,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 3,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35
                    });
                    bermudaTriangle.setMap(map);

                    // Add a listener for the click event.
                    bermudaTriangle.addListener('click', showArrays);

                    infoWindow = new google.maps.InfoWindow;
                }

                /** @this {google.maps.Polygon} */
                function showArrays(event) {
                    // Since this polygon has only one path, we can call getPath() to return the
                    // MVCArray of LatLngs.
                    var vertices = this.getPath();

                    var contentString = '<b>Bermuda Triangle polygon</b><br>' +
                      'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
                      '<br>';

                    // Iterate over the vertices.
                    for (var i =0; i < vertices.getLength(); i++) {
                    var xy = vertices.getAt(i);
                    contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
                        xy.lng();
                    }

                    // Replace the info window's content and position.
                    infoWindow.setContent(contentString);
                    infoWindow.setPosition(event.latLng);

                    infoWindow.open(map);
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ_Fw6bkQbbBxQMb1P72PSMST_bFADblc&callback=initMap" async defer>
            </script>
      </body>
    </html>