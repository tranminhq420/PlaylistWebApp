 <?php $__currentLoopData = $visited; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <?php echo e($place->name); ?>

 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/resources/views/list_place.blade.php ENDPATH**/ ?>