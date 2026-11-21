

<?php $__env->startSection('content'); ?>

<h1>Caisse</h1>

<div class="card mb-3">
    <div class="card-body">
        <h4>Total paiements</h4>
        <h2><?php echo e($totalPaiements); ?></h2>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <h4>Total dépenses</h4>
        <h2><?php echo e($totalDepenses); ?></h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4>Solde</h4>
        <h2><?php echo e($solde); ?></h2>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\caisse\index.blade.php ENDPATH**/ ?>