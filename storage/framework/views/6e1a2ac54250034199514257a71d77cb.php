<?php $__env->startSection('contenido'); ?>
  <h2>Agregar un producto</h2>

  
  <?php if($errors->any()): ?>
    <ul style="color: #b00020;">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  <?php endif; ?>

  
  <form action="/productos/nuevo" method="POST">

    
    <?php echo csrf_field(); ?>

    <p>
      <label for="nombre">Nombre del producto:</label><br>
      
      <input type="text" id="nombre" name="nombre" required>
    </p>

    <p>
      <label for="precio">Precio en Bs:</label><br>
      <input type="number" id="precio" name="precio" required>
    </p>

    <p><button type="submit">Guardar producto</button></p>
  </form>

  <p><a href="/productos">&larr; Volver a la lista</a></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BoliShop\resources\views/productos-nuevo.blade.php ENDPATH**/ ?>