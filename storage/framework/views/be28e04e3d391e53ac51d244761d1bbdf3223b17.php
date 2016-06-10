<?php $__env->startSection('content'); ?>
<div class="col-md-8 col-md-offset-2">
     <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul class="error">
            <?php foreach($errors->all() as $error): ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo e(URL::route('userlogin')); ?>" method="post">
        
        <?php echo e(csrf_field()); ?>

      <div class="form-group has-feedback">
          <input type="email" class="form-control" name="UserName" placeholder="UserName">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" name="Password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo e(URL::route('registration')); ?>" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Project/index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>