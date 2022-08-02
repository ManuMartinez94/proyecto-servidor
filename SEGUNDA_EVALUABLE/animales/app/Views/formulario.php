<main>
    <div class="container pt-5" style="width: 600px;">
        <h1>Búsqueda de fotos por <?=esc($tipo)?></h1>
        <p>Si no especifica el nombre se muestran todas las fotos de los animales en adopción.</p>
        <form action="/fotos/<?= esc($tipo)?>" method="get">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del animal </label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="d-flex justify-content-between">
            <a href="/" class="btn btn-primary " style="width: 100px;">Volver</a> 
            <button type="submit" class="btn btn-primary" style="width: 100px;">Ver</button>
        </div>    
        </form>
    </div>
</main>