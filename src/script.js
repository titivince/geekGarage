window.onload = function() {
  var open = document.getElementById("open-button");
  var close = document.getElementById("parentForm");
  var time = new Date();
  var day = time.getDay();
  var hour = time.getHours();
  var isOpen = document.querySelector('.time');
  
  /* popup */
  open.addEventListener("click", function () {
    document.getElementById("parentForm").style.display = "block"
  });

  close.addEventListener("click", function () { 
    document.getElementById("parentForm").style.display = "none"
  });
  document.getElementById('childForm').addEventListener('click', e => e.stopPropagation());

  /* Verify if the center is open */
  if(day <= 5 & 9 <= hour & hour < 17) {
    isOpen.classList.add('green');
  } else {
    isOpen.classList.add('red');
  }

  /* map */
  map = new OpenLayers.Map("map");
  map.addLayer(new OpenLayers.Layer.OSM());

  var france = new OpenLayers.LonLat(5.6, 46.52).transform( //France
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );
  
  var zoom = 8;
  map.setCenter (france, zoom);
  var markers = new OpenLayers.Layer.Markers( "Markers" );
  map.addLayer(markers);
  var entry = "OL_Icon_";
  var n = 38;
  var ville;
  var lat;
  var lon;
  var adress;
  var tel;
  for( i = 0; i < center.length; i++ ) {
    
    window['entry' + n] = entry + n.toString();
    window['generate' + n] = document.getElementById(entry + n);
    window['ville' + n] = center[i].center;
    lat = parseFloat(center[i].lat);
    lon = parseFloat(center[i].lon);
    window['adress' + n] = center[i].adress;
    window['tel' + n] = center[i].tel;
    n = parseInt(n) + 4;

    var pos = new OpenLayers.LonLat( lon, lat).transform(
      new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
      map.getProjectionObject() // to Spherical Mercator Projection
    );
    
    markers.addMarker(new OpenLayers.Marker(pos));
  }
  
  var entry38 = document.getElementById("OL_Icon_38");
  var entry42 = document.getElementById("OL_Icon_42");
  var entry46 = document.getElementById("OL_Icon_46");
  var entry50 = document.getElementById("OL_Icon_50");
  var entry54 = document.getElementById("OL_Icon_54");

  entry38.addEventListener("click", function () {
    document.getElementById("mapInfo").style.display = "block";
    var centerName = document.getElementById("center");
    centerName.innerHTML = "Centre " + ville38;
    var adressName = document.getElementById("adress");
    adressName.innerHTML = adress38;
    var telName = document.getElementById("tel");
    telName.innerHTML = "Téléphone : " + tel38;
  });

  entry42.addEventListener("click", function () {
    document.getElementById("mapInfo").style.display = "block";
    var centerName = document.getElementById("center");
    centerName.innerHTML = "Centre " + ville42;
    var adressName = document.getElementById("adress");
    adressName.innerHTML = adress42;
    var telName = document.getElementById("tel");
    telName.innerHTML = "Téléphone : " + tel42;
  });

  entry46.addEventListener("click", function () {
    document.getElementById("mapInfo").style.display = "block";
    var centerName = document.getElementById("center");
    centerName.innerHTML = "Centre " + ville46;
    var adressName = document.getElementById("adress");
    adressName.innerHTML = adress46;
    var telName = document.getElementById("tel");
    telName.innerHTML = "Téléphone : " + tel46;
  });
  
  if(entry50 !== null) {
    entry50.addEventListener("click", function () {
      document.getElementById("mapInfo").style.display = "block";
      var centerName = document.getElementById("center");
      centerName.innerHTML = "Centre " + ville50;
      var adressName = document.getElementById("adress");
      adressName.innerHTML = adress50;
      var telName = document.getElementById("tel");
      telName.innerHTML = "Téléphone : " + tel50;
    });
    if(entry54 !== null) {
      entry54.addEventListener("click", function () {
        document.getElementById("mapInfo").style.display = "block";
        var centerName = document.getElementById("center");
        centerName.innerHTML = "Centre " + ville54;
        var adressName = document.getElementById("adress");
        adressName.innerHTML = adress54;
        var telName = document.getElementById("tel");
        telName.innerHTML = "Téléphone : " + tel54;
      });
    }
  }
}