<?php $__env->startSection('contenido'); ?>
    <h2>📦 Nuestros productos</h2>

    <p>Hay <strong><?php echo e(count($productos)); ?></strong> productos guardados en la base de datos 😊</p>

    <ul>
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo e($producto->nombre); ?> — Bs <?php echo e($producto->precio); ?>

                
                
                <?php if(auth()->guard()->check()): ?>
                    <form action="/productos/<?php echo e($producto->id); ?>/eliminar" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                style="background: #e74c3c; color: white; border: none; padding: 2px 10px; border-radius: 4px; cursor: pointer; font-size: 12px;"
                                onclick="return confirm('¿Seguro que quieres eliminar <?php echo e($producto->nombre); ?>?')">
                            ❌ Eliminar
                        </button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php if(auth()->guard()->check()): ?>
        <p><a href="/productos/nuevo">➕ Agregar un producto</a></p>
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        <p style="color: #666; font-style: italic;">🔒 Inicia sesión para administrar productos</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BoliShop\resources\views/productos.blade.php ENDPATH**/ ?>