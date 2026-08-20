<?php $__env->startSection('contenido'); ?>
    <h2>Agregar un producto</h2>

    <?php if($errors->any()): ?>
        <ul style="color: #b00020; background: #f8d7da; padding: 10px; border-radius: 4px;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <form action="/productos/nuevo" method="POST">
        <?php echo csrf_field(); ?>

        <div>
            <label for="nombre">Nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>" required>
        </div>

        <div>
            <label for="precio">Precio en Bs:</label>
            <input type="number" id="precio" name="precio" value="<?php echo e(old('precio')); ?>" required>
        </div>

        
        <div>
            <label for="stock">Cantidad en Stock:</label>
            <input type="number" id="stock" name="stock" value="<?php echo e(old('stock', 0)); ?>" required min="0">
        </div>

        <button type="submit">Guardar producto</button>
    </form>

    <p><a href="/productos">&larr; Volver a la lista</a></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BoliShop\resources\views/productos-nuevo.blade.php ENDPATH**/ ?>