

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('admin.tambah')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="name jurusan">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Singkatan</label>
        <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="singkatan jurusan">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Komptechid\Documents\PROJECT UAS\Development framework\PPDBV7\resources\views/admin/form/jurusan.blade.php ENDPATH**/ ?>