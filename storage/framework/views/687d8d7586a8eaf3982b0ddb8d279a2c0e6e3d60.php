<html>
<head>
    <title>Travel List</title>
</head>

<body>
    <h1>My Travel Bucket List</h1>
    <h2>Places I'd Like to Visit</h2>
    <ul>
      <?php $__currentLoopData = $togo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newplace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($newplace->name); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <h2>Places I've Already Been To</h2>
    <ul>
          <?php $__currentLoopData = $visited; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($place->name); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH /var/www/resources/views/travel_list.blade.php ENDPATH**/ ?>