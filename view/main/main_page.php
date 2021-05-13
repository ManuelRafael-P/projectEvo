<div class="cabecera-inicio text-center animate__animated animate__fadeIn">
    <div class="center">
        <h2 class="title-big">Bienvenidos a Lorem Store</h2>
    </div>
</div>
<div class="content">

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