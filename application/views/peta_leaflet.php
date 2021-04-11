<div class="content">
    <div id="map" style="width: 100%; height: 700px; color:black;"></div>
</div>
<script type="text/javascript">

    // Map
    var map = L.map('map', {
    center: [-1.7912604466772375, 116.42311966554416],
    zoom: 5,
    zoomControl: false, // geocoder
    layers:[]
    });
    var GoogleSatelliteHybrid= L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    maxZoom: 22,
    attribution: 'Google Satellite Hybrid WebGIS Trainning by Fauzan Nurrachman, S. Si., S. Kom '
    }).addTo(map);

    var GoogleMaps= L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 22,
    opacity:1.0,
    attribution: 'Google Maps WebGIS Trainning by Fauzan Nurrachman, S. Si., S. Kom '
    });

    var GoogleRoads= L.tileLayer('https://mt1.google.com/vt/lyrs=h&x={x}&y={y}&z={z}', {
    maxZoom: 22,
    opacity:1.0,
    attribution: 'Google Roads WebGIS Trainning by Fauzan Nurrachman, S. Si., S. Kom '
    });
    
    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var Stadia_AlidadeSmoothDark = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
	maxZoom: 20,
	attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    });

    var USGS_USImagery = L.tileLayer('https://basemap.nationalmap.gov/arcgis/rest/services/USGSImageryOnly/MapServer/tile/{z}/{y}/{x}', {
	maxZoom: 20,
	attribution: 'Tiles courtesy of the <a href="https://usgs.gov/">U.S. Geological Survey</a>'
    });

    // Basemap
    var baseLayers = {'Google Satellite Hybrid': GoogleSatelliteHybrid,'OpenStreetmap Mapnik': OpenStreetMap_Mapnik, 'Stadia Dark': Stadia_AlidadeSmoothDark , 'USGS Imagery' : USGS_USImagery, 'Google Maps': GoogleMaps,'GoogleRoad':GoogleRoads ,};
    var overlayLayers = {}
    L.control.layers(baseLayers, overlayLayers, {collapsed: true}).addTo(map);


    // Mini Map
    var osmUrl='https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
    var osmAttrib='Map data &copy; OpenStreetMap contributors';
    var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
    var rect1 = {color: "#ff1100", weight: 3};
    var rect2 = {color: "#0000AA", weight: 1, opacity:0, fillOpacity:0};
    var miniMap = new L.Control.MiniMap(osm2, {toggleDisplay: true, position : "bottomright", aimingRectOptions
    : rect1, shadowRectOptions: rect2}).addTo(map);

    // Geocoder
    L.Control.geocoder({position :"topleft", collapsed:true}).addTo(map);

   
    //locate control
    /* GPS enabled geolocation control set to follow the user's location */
    var locateControl = L.control.locate({
    position: "topleft",
    drawCircle: true,
    follow: true,
    setView: true,
    keepCurrentZoomLevel: true,
    markerStyle: {
    weight: 1,
    opacity: 0.8,
    fillOpacity: 0.8
    },
    circleStyle: {
    weight: 1,
    clickable: false
    },
    icon: "fa fa-location-arrow",
    metric: false,
    strings: {
    title: "My location",
    popup: "You are within {distance} {unit} from this point",
    outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
    },
    locateOptions: {
    maxZoom: 18,
    watch: true,
    enableHighAccuracy: true,
    maximumAge: 10000,
    timeout: 10000
    }
    }).addTo(map);

    //zoom bar
    var zoom_bar = new L.Control.ZoomBar({position: 'topleft'}).addTo(map);

    //control coordinate
    L.control.coordinates({
    position:"bottomleft",
    decimals:2,
    decimalSeperator:",",
    labelTemplateLat:"Latitude: {y}",
    labelTemplateLng:"Longitude: {x}"
    }).addTo(map);
    L.control.scale().addTo(map);

     // Mata Angin
     var north = L.control({position: "bottomleft"});
    north.onAdd = function(map) {
    var div = L.DomUtil.create("div", "info legend");
    div.innerHTML = '<img src="<?=base_url()?>assets/north-arrow.png" width="`150px" height="150px">';
    return div; }
    north.addTo(map);

    // measure
    var plugin = L.control.measure({
    //  control position
    position: 'topleft',
    //  weather to use keyboard control for this plugin
    keyboard: true,
    //  shortcut to activate measure
    activeKeyCode: 'M'.charCodeAt(0),
    //  shortcut to cancel measure, defaults to 'Esc'
    cancelKeyCode: 27,
    //  line color
    lineColor: 'red',
    //  line weight
    lineWeight: 2,
    //  line dash
    lineDashArray: '6, 6',
    //  line opacity
    lineOpacity: 1,
    //  distance formatter
    // formatDistance: function (val) {
    //   return Math.round(1000 * val / 1609.344) / 1000 + 'mile';
    // }
    }).addTo(map)
</script>