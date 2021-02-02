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

  var france = new OpenLayers.LonLat(5.2, 46.52).transform( //France
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );
  
  var zoom=8;
  map.setCenter (france, zoom);
  var markers = new OpenLayers.Layer.Markers( "Markers" );
  map.addLayer(markers);
  
  for( i = 0; i < center.length; i++ ) {
    var ville = center[i].center;
    var lat = parseFloat(center[i].lat);
    var lon = parseFloat(center[i].lon);
    var adress = center[i].adress;
    var tel = center[i].tel;
    
    var pos = new OpenLayers.LonLat( lon, lat).transform(
      new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
      map.getProjectionObject() // to Spherical Mercator Projection
    );
    
    markers.addMarker(new OpenLayers.Marker(pos));
  }
  
  var posGray = document.getElementById("OL_Icon_38");
  var posVienne = document.getElementById("OL_Icon_42");
  var posBeynost = document.getElementById("OL_Icon_46");

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