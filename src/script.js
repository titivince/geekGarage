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

    var france = new OpenLayers.LonLat(5.275, 46.421) // france
    .transform(
      new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
      map.getProjectionObject() // to Spherical Mercator Projection
    );

    var gray = new OpenLayers.LonLat(5.589968317398288, 47.4478583982884) // Gray
    .transform(
      new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
      map.getProjectionObject() // to Spherical Mercator Projection
    );
    
    var vienne = new OpenLayers.LonLat(4.865783040165061, 45.513962285610944) // Vienne
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
}