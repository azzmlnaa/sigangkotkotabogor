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

/* VARIABLE */
var userLat;
var userLng;

var userMarker;
var currentRoute;
var routingControl;

var selectedNearestPoint = null;

/* GPS REALTIME */
function getUserLocation(){

if(navigator.geolocation){

navigator.geolocation.watchPosition(

showPosition,

showError,

{
enableHighAccuracy:true,
maximumAge:0,
timeout:5000
}

);

}else{

document.getElementById("statusText")
.innerHTML =
"Browser tidak mendukung GPS";

}

}

/* SHOW USER POSITION */
function showPosition(position){

userLat = position.coords.latitude;
userLng = position.coords.longitude;

/* REMOVE OLD MARKER */
if(userMarker){
map.removeLayer(userMarker);
}

/* USER MARKER */
userMarker = L.marker([userLat,userLng])
.addTo(map)
.bindPopup("📍 Lokasi Anda");

/* FIRST VIEW */
if(!window.mapInitialized){

map.setView([userLat,userLng],15);

window.mapInitialized = true;

}

/* STATUS */
document.getElementById("statusText")
.innerHTML =
"Lokasi realtime aktif";

/* UPDATE ROUTING REALTIME */
if(selectedNearestPoint && routingControl){

map.removeControl(routingControl);

routingControl = L.Routing.control({

waypoints:[
L.latLng(userLat,userLng),
L.latLng(
selectedNearestPoint[0],
selectedNearestPoint[1]
)
],

routeWhileDragging:false,

addWaypoints:false,

draggableWaypoints:false,

fitSelectedRoutes:false,

show:false,

lineOptions:{
styles:[{
color:'#111827',
weight:5,
opacity:.85
}]
},

createMarker:function(){
return null;
}

}).addTo(map);

}

}

/* GPS ERROR */
function showError(){

document.getElementById("statusText")
.innerHTML =
"GPS tidak diizinkan pengguna";

}

/* LOAD ROUTE */
function loadNearestRoute(id, warna, nama){

if(!userLat || !userLng){

alert("Aktifkan GPS terlebih dahulu");

return;

}

fetch('trayek.php?id=' + id)

.then(response => response.json())

.then(data => {

var points=[];

/* GET POINTS */
for(var i=0;i<data.length;i++){

points.push([
parseFloat(data[i].latitude),
parseFloat(data[i].longitude)
]);

}

/* REMOVE OLD ROUTE */
if(currentRoute){
map.removeLayer(currentRoute);
}

/* REMOVE OLD NAVIGATION */
if(routingControl){
map.removeControl(routingControl);
}

/* DRAW ANGKOT ROUTE */
currentRoute = L.polyline(points,{
color:warna,
weight:6,
opacity:1,
smoothFactor:2
}).addTo(map);

/* FIND NEAREST POINT */
var nearestPoint = points[0];

var minDistance = Infinity;

points.forEach(function(point){

var distance = map.distance(
[userLat,userLng],
point
);

if(distance < minDistance){

minDistance = distance;
nearestPoint = point;

}

});

/* SAVE NEAREST POINT */
selectedNearestPoint = nearestPoint;

/* REAL ROAD NAVIGATION */
routingControl = L.Routing.control({

waypoints:[
L.latLng(userLat,userLng),
L.latLng(
nearestPoint[0],
nearestPoint[1]
)
],

routeWhileDragging:false,

addWaypoints:false,

draggableWaypoints:false,

fitSelectedRoutes:true,

show:false,

lineOptions:{
styles:[{
color:'#111827',
weight:5,
opacity:.85
}]
},

createMarker:function(){
return null;
}

}).addTo(map);

/* FIT VIEW */
var group = L.featureGroup([
currentRoute,
userMarker
]);

map.fitBounds(group.getBounds(),{
padding:[50,50]
});

/* POPUP */
currentRoute.bindPopup(`
<div style="min-width:180px">

<h6 style="
font-weight:700;
margin-bottom:8px;
">
🚐 ${nama}
</h6>

<small>
Navigasi realtime aktif
</small>

</div>
`).openPopup();

});

}

/* START GPS */
getUserLocation();