window.onload = function() {
  var open = document.getElementById("open-button");
  var close = document.getElementById("parentForm");
  var time = new Date();
  var day = time.getDay();
  var hour = time.getHours();
  var isOpen = document.querySelectorAll('.time');
  
  /* popup */
  open.addEventListener("click", function () {
    document.getElementById("parentForm").style.display = "block"
  });

  close.addEventListener("click", function () { 
    document.getElementById("parentForm").style.display = "none"
  });
  document.getElementById('childForm').addEventListener('click', e => e.stopPropagation());

  /* map */
  map = new OpenLayers.Map("map");
  map.addLayer(new OpenLayers.Layer.OSM());

  var france = new OpenLayers.LonLat(5.2, 46.52) // france
  .transform(
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );

  var gray = new OpenLayers.LonLat(5.589968317398288, 47.4478583982884) // Gray
  .transform(
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );
    
  var vienne = new OpenLayers.LonLat(4.86578, 45.514) // Vienne
  .transform(
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );
    
  var beynost = new OpenLayers.LonLat(4.992214340175005, 45.827193753960614) // Beynost
  .transform(
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );

  var zoom=8;
  var markers = new OpenLayers.Layer.Markers( "Markers" );
  map.addLayer(markers);
    
  markers.addMarker(new OpenLayers.Marker(gray));
  markers.addMarker(new OpenLayers.Marker(vienne));
  markers.addMarker(new OpenLayers.Marker(beynost));

  map.setCenter (france, zoom);
    
  var posGray = document.getElementById("OL_Icon_22");
  var posVienne = document.getElementById("OL_Icon_26");
  var posBeynost = document.getElementById("OL_Icon_30");

  posGray.addEventListener("click", function () {
    document.getElementById("infoGray").style.display = "block";
    document.getElementById("infoVienne").style.display = "none";
    document.getElementById("infoBeynost").style.display = "none";
  });

  posVienne.addEventListener("click", function () {
    document.getElementById("infoGray").style.display = "none";
    document.getElementById("infoVienne").style.display = "block";
    document.getElementById("infoBeynost").style.display = "none";
  });

  posBeynost.addEventListener("click", function () {
    document.getElementById("infoGray").style.display = "none";
    document.getElementById("infoVienne").style.display = "none";
    document.getElementById("infoBeynost").style.display = "block";
  });
  /* Verify if the center is open */
  if(day <= 5 & 9 <= hour & hour < 17) {
    for (var i = 0; i < isOpen.length; i++) {
      isOpen[i].classList.add('green');
    }
  } else {
    for (var i = 0; i < isOpen.length; i++) {
      isOpen[i].classList.add('red');
    }
  }
}