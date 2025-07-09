<!-- ✅ Bootstrap CDN optimizado -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- ✅ CSS locales optimizados -->
<link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- ✅ jQuery optimizado con fallback -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{ asset('js/jquery-1.11.2.min.js') }}"><\/script>');
</script>

<!-- ✅ Scripts locales cargados de forma asíncrona -->
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/sweet-alert.min.js') }}" defer></script>

<!-- ✅ CSS adicional solo cuando sea necesario -->
<link rel="stylesheet" href="{{ asset('css/sweet-alert.css') }}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" media="print" onload="this.media='all'">

<!-- ✅ Ícono -->
<link rel="Shortcut Icon" type="image/x-icon" href="{{ asset('assets/icons/book.ico') }}" />

<style>
.modal-content {
    max-height: 80vh;
    overflow-y: auto;
    background: #fff;
    border-radius: 8px;
    padding: 24px;
    min-width: 320px;
}
</style>

