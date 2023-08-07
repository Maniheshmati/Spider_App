@include('layouts/header')

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>

<div id="map" style="width: 100%; height: 92vh;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const map = L.map('map', {
            maxBounds: L.latLngBounds(L.latLng(-90, -180), L.latLng(90, 180)),
            minZoom: 3
        }).setView([0, 0], 3);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const markers = [];

        @foreach($posts as $post)
            @if ($post->latitude && $post->longitude)
                markers.push([{{ $post->latitude }}, {{ $post->longitude }}]);
            @endif
        @endforeach
        console.log(markers)

        markers.forEach((marker) => {
            const newMarker = L.marker(marker).addTo(map);
            // newMarker.bindPopup("{{ $post->title }}").openPopup();
        });
    });
</script>