<?php
$titulo = 'JFImagen&Visión';
?>
<form role="main">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url?>img/recursos/tienda.jpg" class="d-block w-100" alt="imagendelatienda">
      <div class="carousel-caption d-none d-md-block">
        <h5>Bienvenidos</h5>
        <p>¡Gracias por Elegir la Oportunidad!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url?>img/recursos/tienda.jpg" class="d-block w-100" alt="imagendelatienda">
      <div class="carousel-caption d-none d-md-block">
        <h5>Tienda Fisica.</h5>
        <p>Nos encontraras en el mercado Sarita Colonia puesto.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url?>img/recursos/tienda.jpg" class="d-block w-100" alt="imagendelatienda">
      <div class="carousel-caption d-none d-md-block">
        <h5>Directora</h5>
        <p>Judith Mateo Villavicencio</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Nosotros.</h2>
                <p class="lead">Somos Una Empresa que tiene un compromiso con todos nuestros clientes, buscamos brindar un servicio de calidad y que nustros clientes se sientan  .</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading"> Misión</h2>
                <p class="lead">Cumplir con las expectativas de nuestros clientes,brindar un servicio de calidad y estar comprometidos</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Visión</h2>
                <p class="lead">Ser una de las mejores empresas del mercado al servicio del cliente, que nuestros servicios se extiendan a más lugares, para atraer a mucho más clientes</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div>
</form>
