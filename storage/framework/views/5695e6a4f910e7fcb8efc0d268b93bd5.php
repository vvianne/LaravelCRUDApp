

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Item</h1>
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('items.create')); ?>" class="btn btn-primary">Tambah Item</a>
        <?php endif; ?>
    </div>
    
    <div class="list-group">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><?php echo e($item->name); ?></h5>
                        <p><?php echo e($item->description); ?></p>
                    </div>
                    <?php if(auth()->guard()->check()): ?>
                        <div>
                            <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Melody\pemweb\laravel-crud-app\resources\views/items/index.blade.php ENDPATH**/ ?>