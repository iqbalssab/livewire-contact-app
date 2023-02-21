// menampilkan map di layar
var map = L.map('map').setView([-7.296643, 108.765715], 15);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// tambah marker biru
var marker = L.marker([-7.296643, 108.765715]).addTo(map);
// tambah lingkaran
var circle = L.circle([-7.297258, 108.768970], {
    color: 'red',
    fillColor: 'yellow',
    fillOpacity: 0.3,
    radius: 100
}).addTo(map);

var polygon = L.polygon([
    [-7.296643, 108.765715],
    [-7.297258, 108.768970],
    [-7.298822, 108.762657]
]).addTo(map);

marker.bindPopup("<b>Hello world!</b><br>Imah aing.")
circle.bindPopup("Gatau rumah <b>siapa</b>.").openPopup()
polygon.bindPopup("I am a polygon.")

// function onMapClick(e) {
// let lokasi = e.latlng
// console.log('Latitude : ',lokasi.lat);
// console.log('Longitude : ',lokasi.lng);
// }

let popup = L.popup();

const onMapClick = (e) => {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng)
        .openOn(map);
console.log(e.latlng.lat);
    }

map.on('click', onMapClick);
