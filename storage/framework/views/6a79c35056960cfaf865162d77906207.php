

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header"><?php echo e(isset($item) ? 'Edit' : 'Tambah'); ?> Item</div>
        
        <div class="card-body">
            <form method="POST" action="<?php echo e(isset($item) ? route('items.update', $item->id) : route('items.store')); ?>">
                <?php echo csrf_field(); ?>
                <?php if(isset($item)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="<?php echo e(old('name', $item->name ?? '')); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?php echo e(old('description', $item->description ?? '')); ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo e(route('items.index')); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Melody\pemweb\laravel-crud-app\resources\views/items/edit.blade.php ENDPATH**/ ?>