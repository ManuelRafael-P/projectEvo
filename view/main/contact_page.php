<div class="content">
    <div class="container">
        <div class="jumbotron">
            <p>Puedes encontrarnos actualmente en Gamarra</p>
            <div class="row">
                <div class="col">
                    <p>Telf: +51 967430953</p>
                    
                </div>
                <div class="col">
                <p>Telf: +51 956559031</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Email: monnijeans@gmail.com</p>
                </div>
                <div class="col">
                    <p>Dir: Lima, jirón Gamarra 1043 – 1051, Centro Comercial YA, La Victoria</p>
                </div>
            </div>
            <p>Mapa</p>
            <div id="map"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var map = L.map('map').setView([-12.068629324210006, -77.01274457343519], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([-12.068629324210006, -77.01274457343519]).addTo(map)
            .bindPopup('¡Encuentranos aquí!')
            .openPopup();
    });
</script>