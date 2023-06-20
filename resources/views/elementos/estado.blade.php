<div class="container mx-auto">

    <div class="flex justify-center flex-wrap px-6 my-9">

        <!-- Row -->
        @include('elementos.cambio')

    </div>
</div>

<script>
    function toggleImage() {
        var contenedorImagen = document.getElementById("contenedor-imagen");
        if (contenedorImagen.hasAttribute("hidden")) {
            contenedorImagen.removeAttribute("hidden");
        } else {
            contenedorImagen.setAttribute("hidden", "");
        }
    }

    function toggleImage2() {
        var contenedorImagen = document.getElementById("contenedor-imagen2");
        if (contenedorImagen.hasAttribute("hidden")) {
            contenedorImagen.removeAttribute("hidden");
        } else {
            contenedorImagen.setAttribute("hidden", "");
        }
    }
</script>

