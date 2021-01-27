window.onload = function() {
    var open = document.getElementById("open-button");
    var close = document.getElementById("parentForm");
    
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

    var lonLat = new OpenLayers.LonLat( -0.127968 ,51.507728 )
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
          
    var zoom=10;

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    
    markers.addMarker(new OpenLayers.Marker(lonLat));
    
    map.setCenter (lonLat, zoom);
}