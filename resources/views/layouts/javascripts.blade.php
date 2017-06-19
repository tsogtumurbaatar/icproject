  <!-- JavaScript -->
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
   <script src="js/dirPagination.js"></script>
  <script src="js/ui-bootstrap-tpls-2.4.0.js"></script>

   <script type="text/javascript">
    var app = angular.module("myApp",['angularUtils.directives.dirPagination','ui.bootstrap']);
  </script>
  {{-- Controllers --}}
  <script src="app/controllers/cityController.js"></script>
  <script src="app/controllers/factorController.js"></script>
  <script src="app/controllers/segmentController.js"></script>
  <script src="app/controllers/indicatorController.js"></script>
  <script src="app/controllers/datapointController.js"></script>
  <script src="app/controllers/createChartController.js"></script>
  {{-- Services --}}
  <script src="app/services/cityService.js"></script> 
  <script src="app/services/factorService.js"></script> 
  <script src="app/services/segmentService.js"></script> 
  <script src="app/services/indicatorService.js"></script> 
  <script src="app/services/datapointService.js"></script> 
    

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/script.js"></script>
	<script src="js/nouislider.min.js"></script>
	<!-- StikyMenu -->
	{{-- <script src="js/stickUp.min.js"></script> --}}
	{{-- <script type="text/javascript">
	  jQuery(function($) {
		$(document).ready( function() {
		  $('.navbar-default').stickUp();
		  
		});
	  });
	
	</script> --}}
	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/jquery.corner.js"></script> 
	<script src="js/wow.min.js"></script>
	<script>
	 new WOW().init();
	</script>
	<script src="js/classie.js"></script>
	{{-- <script src="js/uiMorphingButton_inflow.js"></script> --}}
	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script> 
 
 @if(Request::path() === 'chartjs') 
<script src="js/Chart.js"></script>
<script>
 $(function(){
  $.getJSON("/icproject3/public/chartdata", {name: "{{$segment_id}}"}, function (result) {
    var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
        labels.push(result[i].city_name);
        data.push(result[i].summary);
    }
    var buyerData = {
      labels : labels,
      datasets : [
        {
          fillColor : "rgba(54, 162, 235, 0.2)",
          strokeColor : "rgba(54, 162, 235, 1)",
          pointColor : "#1583CD",
          pointStrokeColor : "#095E96",
          data : data
        }
      ]
    };

    var buyerData1 = {
      labels : labels,
      datasets : [
        {
          fillColor : "rgba(75, 192, 192, 0.2)",
          strokeColor : 'rgba(75, 192, 192, 1)',
          pointColor : "#21a6a3",
          pointStrokeColor : "#1f746c",
          data : data
        }
      ]
    };


    var buyers = document.getElementById('projects-graph').getContext('2d');
    
    new Chart(buyers).Bar(buyerData1, {
      bezierCurve : true
    });
  
  	// var buyers1 = document.getElementById('projects-graph1').getContext('2d');
    
   //  new Chart(buyers1).Line(buyerData1, {
   //    bezierCurve : true
   //  });

    var buyers2 = document.getElementById('projects-graph2').getContext('2d');
    
    new Chart(buyers2).Line(buyerData, {
      bezierCurve : true
    });

    var buyers3 = document.getElementById('projects-graph3').getContext('2d');
    
    new Chart(buyers3).Radar(buyerData, {
      bezierCurve : true
    });
    

  });

});
</script>

<script>
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyBzY3OlvOZabcfAXI8DohL0cU0I1fQmx6w&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    map.setTilt(45);
        
    // Multiple Markers
    var markers = [
    @foreach ($cities as $city)
        ['{{ $city->city_desc}}',  {{$city->city_lat}},  {{$city->city_long}}],
    @endforeach
    ];
                        
    // Info Window Content
    var infoWindowContent = [
    @foreach ($cities as $city)
        ['<b>{{$city->city_desc}}</b>' +
        '<p>Calculated point = {{ $data_array_summary[$city->city_id] }}</p>'],
      @endforeach
    ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

   
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(4);
        google.maps.event.removeListener(boundsListener);
    });
    
}

</script>

{{--  <script>
  function myMap() {
 var myCenter = new google.maps.LatLng(51.508742,-0.120850);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
};
</script>


<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzY3OlvOZabcfAXI8DohL0cU0I1fQmx6w&callback=myMap">
</script>
 --}}

@endif