

<?php $__env->startSection('content'); ?>

<h1>Nouvelle dépense</h1>

<form method="POST"
      action="<?php echo e(route('depenses.store')); ?>">

    <?php echo csrf_field(); ?>

    <div class="mb-3">

        <label>Date</label>

        <input
            type="date"
            name="date_depense"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Catégorie</label>

        <input
            type="text"
            name="categorie"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Libellé</label>

        <input
            type="text"
            name="libelle"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Montant</label>

        <input
            type="number"
            step="0.01"
            name="montant"
            class="form-control">

    </div>

    <button
        class="btn btn-primary">

        Enregistrer

    </button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\depenses\create.blade.php ENDPATH**/ ?>