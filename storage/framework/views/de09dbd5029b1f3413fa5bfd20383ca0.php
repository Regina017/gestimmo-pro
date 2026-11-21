

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">
                📊 Centre des rapports
            </h3>
        </div>

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-6">

                    <a href="<?php echo e(route('rapports.biens')); ?>"
                       class="btn btn-primary w-100">
                        📄 Rapport des biens
                    </a>

                </div>

                <div class="col-md-6">

                    <a href="<?php echo e(route('rapports.locataires')); ?>"
                       class="btn btn-success w-100">
                        👥 Rapport des locataires
                    </a>

                </div>

                <div class="col-md-6">

                    <a href="<?php echo e(route('rapports.contrats')); ?>"
                       class="btn btn-warning w-100">
                        📑 Rapport des contrats
                    </a>

                </div>

                <div class="col-md-6">

                    <a href="<?php echo e(route('rapports.paiements')); ?>"
                       class="btn btn-info w-100 text-white">
                        💰 Rapport des paiements
                    </a>

                </div>

                <div class="col-md-12">

                    <a href="<?php echo e(route('rapports.depenses')); ?>"
                       class="btn btn-danger w-100">
                        💳 Rapport des dépenses
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\rapports\index.blade.php ENDPATH**/ ?>