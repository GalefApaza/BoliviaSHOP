<?php $__env->startSection('contenido'); ?>
    <h2>Nuestros productos</h2>

    <p>Hay <strong><?php echo e(count($productos)); ?></strong> productos guardados en la base de datos 😊</p>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background: #2c3e50; color: white;">
                <th style="padding: 10px; text-align: left;">Producto</th>
                <th style="padding: 10px; text-align: right;">Precio (Bs)</th>
                <th style="padding: 10px; text-align: center;">Stock</th>  
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;"><?php echo e($producto->nombre); ?></td>
                    <td style="padding: 10px; text-align: right;">Bs <?php echo e($producto->precio); ?></td>
                    <td style="padding: 10px; text-align: center;">
                        <?php if($producto->stock > 0): ?>
                            <span style="color: green;">✅ <?php echo e($producto->stock); ?></span>
                        <?php else: ?>
                            <span style="color: red;">❌ <?php echo e($producto->stock); ?></span>
                        <?php endif; ?>
                    </td>  
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <p style="margin-top: 20px;"><a href="/productos/nuevo">+ Agregar un producto</a></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BoliShop\resources\views/productos.blade.php ENDPATH**/ ?>