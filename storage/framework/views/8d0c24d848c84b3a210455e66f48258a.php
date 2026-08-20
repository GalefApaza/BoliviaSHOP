<?php $__env->startSection('contenido'); ?>
  <h2>Entrar al panel</h2>

  
  <?php if(session('error')): ?>
    <p style="color: #b00020;"><strong><?php echo e(session('error')); ?></strong></p>
  <?php endif; ?>

  <form action="/login" method="POST">

    
    <?php echo csrf_field(); ?>

    <p>
      <label for="email">Correo:</label><br>
      <input type="email" id="email" name="email" required>
    </p>

    <p>
      
      <label for="password">Contraseña:</label><br>
      <input type="password" id="password" name="password" required>
    </p>

    <p><button type="submit">Entrar</button></p>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BoliShop\resources\views/login.blade.php ENDPATH**/ ?>