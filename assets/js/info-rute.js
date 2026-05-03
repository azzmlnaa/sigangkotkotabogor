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

var currentRoute;

/* SHOW ROUTE */
function showRoute(id, warna, nama, kode){

fetch('trayek.php?id=' + id)

.then(response => response.json())

.then(data => {

var points=[];

for(var i=0;i<data.length;i++){

points.push([
parseFloat(data[i].latitude),
parseFloat(data[i].longitude)
]);

}

/* REMOVE OLD */
if(currentRoute){
map.removeLayer(currentRoute);
}

/* DRAW */
currentRoute = L.polyline(points,{
color:warna,
weight:7,
opacity:1,
smoothFactor:2
}).addTo(map);

/* FIT */
map.fitBounds(currentRoute.getBounds(),{
padding:[40,40]
});

/* POPUP */
currentRoute.bindPopup(`
<div style="min-width:160px">

<h6 style="font-weight:700;margin-bottom:6px">
${kode}
</h6>

<div style="font-size:14px">
${nama}
</div>

<small>
Trayek Angkot Kota Bogor
</small>

</div>
`).openPopup();

});

}

/* SEARCH */
document.getElementById("searchRoute")
.addEventListener("keyup", function(){

let keyword = this.value.toLowerCase();

let cards = document.querySelectorAll(".route-card");

cards.forEach(function(card){

let route = card.getAttribute("data-route");

if(route.includes(keyword)){

card.style.display = "flex";

}else{

card.style.display = "none";

}

});

});