<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="/bootstrap/css/customCss.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-6 col-md-offset-3">
            <?php if(isset($message)): ?>
            <div class="alert alert-danger">
                <?php echo e($message); ?>

            </div>
            <?php endif; ?>
        </div>
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
                <p class="login-box-msg">Change Password</p>

                <form action="<?php echo e(URL::route('change')); ?>" method="post" id="changePassword">

                    <?php echo e(csrf_field()); ?>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="OldPassword" placeholder="Old Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat">Change Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-box-body -->
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script src='/bootstrap/js/jqueryvalidation.js' type="text/javascript"></script>
        <script src="/bootstrap/js/validation.js" type="text/javascript"></script>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Project/index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>