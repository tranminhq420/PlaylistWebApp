<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://open.spotify.com/embed-podcast/iframe-api/v1" async></script>
    <title>Songs list</title>
</head>

<body>
    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <iframe style="border-radius:12px" src="<?php echo e($song->link); ?>" height="152" width="300" frameBorder="0"
            allowtransparency="true" allow="encrypted-media; picture-in-picture" loading="lazy"></iframe>
        <?php echo e($song->name); ?>

        <button type="button" class="btn btn-primary" onclick="window.location='<?php echo e(url('/')); ?>'">
            edit
        </button><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>

</html>
<?php /**PATH /var/www/resources/views/show_song.blade.php ENDPATH**/ ?>