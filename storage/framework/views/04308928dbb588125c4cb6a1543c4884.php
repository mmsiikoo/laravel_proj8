 

<?php $__env->startSection('content'); ?>
    <h2>Список доступних товарів:</h2>

    
    <?php if(isset($products) && count($products) > 0): ?>
        <ul>
            
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    
                    <a href="/products/<?php echo e($product->id); ?>">
                        <strong><?php echo e($product->name); ?></strong>
                    </a>
                    — <?php echo e($product->price); ?> грн
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php else: ?>
        <p>На жаль, товарів поки немає.</p>
    <?php endif; ?>

    <hr>
    <h3>Додати товар (Демонстрація POST):</h3>
    <form action="/" method="POST">

        
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Назва товару">
        <button type="submit">Додати</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\backend_projects\project_laravel\resources\views/products/index.blade.php ENDPATH**/ ?>