<div class="cabecera-contacto text-center animate__animated animate__fadeIn">
    <div class="center">
        <h2 class="title-big">Contactanos</h2>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="jumbotron">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur quidem reprehenderit eaque alias cumque incidunt in, unde deserunt? Quam quisquam numquam optio labore tenetur, perferendis ad illum excepturi ab doloremque.</p>
            <div class="row">
                <div class="col">
                    <p>Telf: 999888666</p>
                </div>
                <div class="col">
                    <p>Tef fijo: (01)6457189</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Email: asdasdasda@gmail.com</p>
                </div>
                <div class="col">
                    <p>Dir: Av. aaaaa N°1111 Lima,Lima</p>
                </div>
            </div>
            <p>Mapa</p>
            <div id="map"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var map = L.map('map').setView([51.505, -0.09], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([51.5, -0.09]).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();
    });
</script>