

<?php $__env->startSection('content'); ?>

<h1>Journal des actions</h1>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Date</th>

            <th>Utilisateur</th>

            <th>Action</th>

        </tr>

    </thead>

    <tbody>

    <?php $__currentLoopData = $journals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $journal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>

            <td>
                <?php echo e($journal->created_at); ?>

            </td>

            <td>
                <?php echo e($journal->utilisateur); ?>

            </td>

            <td>
                <?php echo e($journal->action); ?>

            </td>

        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\journals\index.blade.php ENDPATH**/ ?>