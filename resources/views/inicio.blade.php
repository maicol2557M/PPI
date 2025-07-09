<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="" />
    <link rel="stylesheet"
    href="{{ asset('https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css') }}">
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('layouts.nav')
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles"><small>Inicio</small></h1>
            </div>
        </div>
        <section class="full-reset text-center inner-container .outer-container">
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img1/image.png" class="card-img-top tamaño-card" alt="...">
                    <div class="card-body">
                        <h3 class="card-title letra">Asesoría en Derecho Tributario</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="{{ route('asesoria') }}" class="btn btn-primary">click aqui</a>
                    </div>
                </div>
            </article>
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img1/image copy.png" class="card-img-top tamaño-card" alt="...">
                    <div class="card-body">
                        <h3 class="card-title letra">Consultoría Jurídica Empresarial</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="{{ route('consulta_juridica_empresarial') }}" class="btn btn-primary">click aqui</a>
                    </div>
                </div>
            </article>
            <!--<div class="tile-num full-reset btn-pro"><button style="background-color: #dfbf71;">click</button></div>-->
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img1/image copy 7.png" class="card-img-top tamaño-card" alt="...">
                    <div class="card-body">
                        <h3 class="card-title letra">Planeación Fiscal Estratégica</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="{{ route('planeacion') }}" class="btn btn-primary">click aqui</a>
                    </div>
                </div>
            </article>
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img1/image copy 3.png" class="card-img-top tamaño-card" alt="...">
                    <div class="card-body">
                        <h3 class="card-title letra" style="font-size: 38.5px;">Regularización Fiscal</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content card title and make ofthe card's content.</p>
                        <a href="{{ route('defensa') }}" class="btn btn-primary">click aqui</a>
                    </div>
                </div>
            </article>
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img1/image copy 4.png" class="card-img-top tamaño-card" alt="...">
                    <div class="card-body">
                        <h3 class="card-title letra">Auditoría Fiscal Preventiva Trubutaria</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="{{ route('auditoria') }}" class="btn btn-primary">click aqui</a>
                    </div>
                </div>
            </article>
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img1/image copy 5.png" class="card-img-top tamaño-card" alt="...">
                    <div class="card-body">
                        <h3 class="card-title letra">Consultoría en Tributación Internacional</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="{{ route('consulta_tributaria') }}" class="btn btn-primary">click aqui</a>
                    </div>
                </div>
            </article>
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img1/image copy 6.png" class="card-img-top tamaño-card" alt="...">
                    <div class="card-body">
                        <h3 class="card-title letra">Capacitación en Legislación Tributaria</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="{{ route('capacitacion') }}" class="btn btn-primary">click aqui</a>
                    </div>
                </div>
            </article>
            <article>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img1/image copy 2.png" class="card-img-top tamaño-card" alt="...">
                    <div class="card-body">
                        <h3 class="card-title letra">Defensa Fiscal y Representación Jurídica</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="{{ route('regulacion') }}" class="btn btn-primary">click aqui</a>
                    </div>
                </div>
            </article>
        </section>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias
                        ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam
                        ipsa accusamus error. Animi mollitia corporis iusto.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>

    @include('layouts.script')
</body>

</html>
