<button id="btn-nuevo">+ Nueva categoría</button>
<dialog id="modal-crear">
    <h1>Crear nueva categoria</h1>
    <form method="POST" action="{{ route('categoria.store') }}">
        @csrf
        <label for="nombre">Nombre de la categoria</label>
        <br>
        <input type="text" name="nombre" id="crear-nombre">
        <br>
        <label for="descripcion">Descripción de la categoria</label>
        <br>
        <textarea type="text" name="descripcion" id="crear-descripcion" rows="3"> </textarea>
        <br>
        <button type="button" id="btn-cerrar-crear">Cancelar</button>
        <button>Guardar</button>
    </form>
</dialog>
<script>
    const btnNuevo = document.getElementById("btn-nuevo");
    const modalCrear = document.getElementById("modal-crear");
    const btnCancelar = document.getElementById("btn-cerrar-crear");

    btnNuevo.addEventListener("click", function() {
        modalCrear.showModal();
    });

    btnCancelar.addEventListener("click", function() {
        modalCrear.close();
    });
</script>
