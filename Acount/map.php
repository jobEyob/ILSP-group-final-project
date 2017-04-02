<!DOCTYPE html>
<html>
  <head>
    
  </head>
  <body>

    
   


    
    <script>
      function initMap() {
          
            var mapCanvas = document.getElementById("map");
            var mapOptions = {
                center: new google.maps.LatLng(8.9806034, 38.75776050000002),
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
                
            
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            
            var map = new google.maps.Map(mapCanvas , mapOptions);
               map.setTilt(45);

              
            google.maps.event.addListener(map, 'click', function (e) {
                confirm("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
               var lati = e.latLng.lat(); var long = e.latLng.lng();
               document.getElementById("Latitude").value=lati;
               document.getElementById("Longitude").value=long;
            });                                    
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBfNj154XXsUT8pOYTI26rg5UhpI5DWDo&callback=initMap">
    </script>
  </body>
</html>