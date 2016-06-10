<?php $__env->startSection('content'); ?>
<div class="col-md-8 col-md-offset-1">
    
    <h1><?php echo e($message); ?></h1>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Project/index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>