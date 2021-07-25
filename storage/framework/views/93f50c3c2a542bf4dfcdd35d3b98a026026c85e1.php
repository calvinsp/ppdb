

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <h6>Welcome Back <?php echo e(Auth::user()->name); ?></h6>
                    <br>
                    <div class="row">
                        <span>Profile User</span>
                        <div class="col">
                            <ul class="data-diri" style="list-style-type:none;">
                                <li>Nama : <b><?php echo e(Auth::user()->name); ?></b></li>
                                <li>Email : <b><?php echo e(Auth::user()->email); ?></b></li>
                                <li>Tanggal Join : <b><?php echo e(Auth::user()->created_at); ?></b></li>
                                <li>Status : <b><?php echo e(Auth::user()->status_seleksi); ?></b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\Programing\ppdb\resources\views/front/dashboard.blade.php ENDPATH**/ ?>