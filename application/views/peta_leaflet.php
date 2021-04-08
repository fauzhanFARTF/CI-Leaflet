<div class="content">
    <div id="map" style="width: 100%; height: 530px; color:black;"></div>
</div>
<script>
    var map = L.map('map', {
    center: [-1.7912604466772375, 116.42311966554416],
    zoom: 5,
    layers:[]
    });
    var GoogleSatelliteHybrid= L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    maxZoom: 22,
    attribution: 'WebGIS Trainning by Roni Haryadi'
    }).addTo(map);

    var baseLayers = {'Google Satellite Hybrid': GoogleSatelliteHybrid};
    var overlayLayers = {}
    L.control.layers(baseLayers, overlayLayers, {collapsed: false}).addTo(map);

</script>