<main>
    <div class="text-center">
        <h1><?=esc($title);?></h1>
    </div>
    <div class="container">
    <div class="row">
        <?php if(!empty($animales) && is_array($animales)) : ?>
        <?php foreach($animales as $foto) : ?>
        <!-- Decodifica las imágenes     -->
        <?php $imagen = (preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $foto['imagen'])) ?  $foto['imagen'] : base64_encode($foto['imagen']);?> 
        <div class="col-md-6 col-lg-4">
            <div class="card my-3" style="width: 250px;">
                <?php
                    echo '<img class="card-img-top" src="data:image/jpeg;base64,'. $imagen .'"/>';
                ?>
                <h4 class="card-title mt-3">Nombe: <?=esc($foto['nombre'])?></h4>
                <p class="card-text">Protectora: <?=esc($foto['protectora'])?></p>
                <p class="card-text">Telf. <?=esc($foto['telefono'])?></p>
            </div>
        </div>
        <?php endforeach;?> 
        <?php else : ?>
        <div class="text-center mt-5">
            <h2>No se han encontrado animales.</h2>
        </div>
        <?php endif;?>
    </div>
    <div class="row">
    <a href="<?= $_SERVER["HTTP_REFERER"] ?>" class="btn btn-primary" style="width: 100px; margin:auto; margin-top: 50px;">Volver</a>     

    </div>
    </div>
</main>