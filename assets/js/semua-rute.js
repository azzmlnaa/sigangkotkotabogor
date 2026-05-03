var map = L.map('map',{
zoomControl:false
}).setView([-6.5950,106.8166],13);

/* TILE */
L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
maxZoom:19
}).addTo(map);

/* ZOOM */
L.control.zoom({
position:'bottomright'
}).addTo(map);

/* LOAD ALL ROUTES */
trayekData.forEach(function(route){

fetch('trayek.php?id=' + route.id)

.then(response => response.json())

.then(data => {

var points = [];

for(var i=0;i<data.length;i++){

points.push([
parseFloat(data[i].latitude),
parseFloat(data[i].longitude)
]);

}

L.polyline(points,{
color:route.warna,
weight:5,
opacity:.95,
smoothFactor:2
}).addTo(map);

});

});