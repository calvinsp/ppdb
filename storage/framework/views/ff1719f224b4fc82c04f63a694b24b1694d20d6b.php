

<?php $__env->startSection('content'); ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel Jurusan</h1>
                        <a href="<?php echo e(route('admin.form-jurusan')); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah jurusan</a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <?php if(session('sukses')): ?>
                    	<div class="alert alert-success d-flex align-items-center" role="alert">
						  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <div>
						    <?php echo e(session('sukses')); ?>

						  </div>
						</div>
						<?php endif; ?>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Jurusan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>
                                            <th>Singkatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>
                                            <th>Singkatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <?php $no=1; ?>
						            <?php $__currentLoopData = $jrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($val->nama_jurusan); ?></td>
                                            <td><?php echo e($val->singkatan); ?></td>
                                            <td><a href="#" style="color: grey;"><i class="fas fa-pencil-alt"></i></a> | <a href="#" style="color: red;" onclick="myFunction()" id="demo"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content --> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Komptechid\Documents\PROJECT UAS\Development framework\PPDBV7\resources\views/admin/jurusan.blade.php ENDPATH**/ ?>