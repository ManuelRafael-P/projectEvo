<div class="cabecera-inicio text-center animate__animated animate__fadeIn">
    <div class="center">
        <h2 class="title-big">Bienvenidos a Lorem Store</h2>
    </div>
</div>
<div class="content">

    <div class="container">
        
        <img src="assets/productImages/P0000002-1.jpg" alt="">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" style="height:80vh" src="assets/images/fondo1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height:80vh" src="assets/images/fondo2.jpg"" alt=" Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height:80vh" src="assets/images/fondo01.jpg"" alt=" Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

</div>



<script>
    $('#recipeCarousel').carousel({
        interval: 5000
    })
    $('#recipeCarousel_1').carousel({
        interval: 5000
    })

    $('.carousel .carousel-item').each(function() {
        var minPerSlide = 3;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>