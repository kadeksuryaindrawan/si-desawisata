function myMap(lat, long) {
    const map = L.map('mapid').setView([lat, long], 15);

    var container = L.DomUtil.get('mapid');
    if (container != null) {
        container._leaflet_id = null;
    }

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const marker = L.marker([lat, long]).addTo(map)
        .bindPopup('<b>Titik Lokasi</b><br />Lokasi.').openPopup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(`You clicked the map at ${e.latlng.toString()}`)
            .openOn(map);
    }
    map.on('click', onMapClick);
}