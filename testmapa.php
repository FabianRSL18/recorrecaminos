<?php
// Clave de API (reemplaza con tu clave real)
$googleMapsApiKey = "AIzaSyCe1d7MWxY28izsGaB6QBcjDQTFgJ59ydM";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Interactivo</title>
    <style>
        /* Define el estilo para el mapa */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Selecciona un lugar en el mapa</h1>
    <p id="coordinates">Haz clic en el mapa para seleccionar un lugar.</p>
    <div id="map"></div>

    <script>
        let map;
        let marker;

        function initMap() {
            // Coordenadas iniciales
            const initialLocation = { lat: 19.432608, lng: -99.133209 }; // Ciudad de México

            // Crear el mapa
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: initialLocation,
            });

            // Escuchar eventos de clic en el mapa
            map.addListener("click", (event) => {
                const clickedLocation = event.latLng;

                // Actualiza el marcador o crea uno si no existe
                if (marker) {
                    marker.setPosition(clickedLocation);
                } else {
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                    });
                }

                // Muestra las coordenadas seleccionadas
                document.getElementById("coordinates").innerText =
                    `Latitud: ${clickedLocation.lat()}, Longitud: ${clickedLocation.lng()}`;
            });
        }
    </script>

    <!-- Script de Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $googleMapsApiKey; ?>&callback=initMap" async defer></script>
</body>
</html>
