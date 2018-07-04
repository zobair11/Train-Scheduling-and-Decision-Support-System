<body><hr>
  <h1>  Maps Point Implementation of Crossing Detection <br>  <hr><hr> </h1>
    <div style='height:650px;width:100%'id="map"> </div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: new google.maps.LatLng(24.027738,90.996409),
          mapTypeId: 'roadmap'
        });

        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var icons = {
          Very_Large: {
            icon: '1.png'
          },
		  
		  Large: {
            icon: '2.png'
          },
		  
		  
		   Medium: {
            icon: '3.png'
          },
		  
		  
		  Small: {
            icon: '4.png'
          },
		  
		   Very_Small: {
            icon: '5.png'
          },
		  
          library: {
            icon: iconBase + 'library_maps.png'
          },
          info: {
            icon: iconBase + 'info-i_maps.png'
          }
        };

        function addMarker(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        }

        var features = [
          {
            position: new google.maps.LatLng(23.966000,91.093400),
            type: 'Very_Large'
          }, 
		 <?php 

include"conn.php";




  $lat1=24.027528;
  $lon1=90.994402;

  $lat2=24.027391;
  $lon2=90.993372;
  
  $lat3=24.027175;
  $lon3=90.992364;
  
$lat4=24.027136;
  $lon4=90.991355;

  $xxx="Small";
 echo " {
            position: new google.maps.LatLng(23.966000,91.093400),
            type: '$xxx'
          }," ;
  
echo " {
            position: new google.maps.LatLng($lat2, $lon2),
            type: '$xxx'
          }," ;
		  
		  echo " {
            position: new google.maps.LatLng($lat3, $lat3),
            type: '$xxx'
          }," ;
		  
		  echo " {
            position: new google.maps.LatLng($lat4, $lat4),
            type: '$xxx'
          }," ;
		  
  ?>
		
		  {
            position: new google.maps.LatLng(-33.91539, 151.22820),
            type: 'info'
          }
        ];

        for (var i = 0, feature; feature = features[i]; i++) {
         //addMarker(feature);
		 
        addMarker(feature);
		
		}
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlNThG-ZxIs519bD308dAl_zu7O2Ple4A&callback=initMap">
    </script>
  </body>
</html>

