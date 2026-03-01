 

<?php $__env->startSection('content'); ?>
    <h2>Деталі товару №<?php echo e($id); ?></h2> 

    
    <?php if(isset($product)): ?>
        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
            
            <h3>Назва: <?php echo e($product->name); ?></h3>
            <p>Ціна: <strong><?php echo e($product->price); ?> грн</strong></p>
        </div>
    <?php else: ?>
        <p>Товар не знайдено.</p>
    <?php endif; ?>

    <br>
    <a href="/">Повернутися до списку</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\backend_projects\project_laravel\resources\views/products/show.blade.php ENDPATH**/ ?>