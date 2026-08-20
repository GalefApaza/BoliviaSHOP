<?php $__env->startSection('contenido'); ?>
    <h2>📧 Contáctanos</h2>
    
    
    <?php if(session('success')): ?>
        <div class="alert-success">
            ✅ <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
        <div class="alert-error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>❌ <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('contact.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        
        <div>
            <label for="name">👤 Nombre:</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="<?php echo e(old('name')); ?>" 
                   placeholder="Escribe tu nombre"
                   required>
        </div>
        
        <div>
            <label for="email">📧 Correo Electrónico:</label>
            <input type="email" 
                   name="email" 
                   id="email" 
                   value="<?php echo e(old('email')); ?>" 
                   placeholder="tucorreo@ejemplo.com"
                   required>
        </div>
        
        <div>
            <label for="message">💬 Mensaje:</label>
            <textarea name="message" 
                      id="message" 
                      rows="5" 
                      placeholder="Escribe tu mensaje aquí..."
                      required><?php echo e(old('message')); ?></textarea>
        </div>
        
        <button type="submit">📨 Enviar Mensaje</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\BoliShop\resources\views/contacto.blade.php ENDPATH**/ ?>