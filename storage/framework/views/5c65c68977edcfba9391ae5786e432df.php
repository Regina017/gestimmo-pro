<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport des occupations</title>
</head>
<body>

<h1>Rapport des occupations</h1>

<table border="1" width="100%" cellpadding="5">

    <tr>
        <th>Bien</th>
        <th>Locataire</th>
        <th>Date entrée</th>
        <th>Statut</th>
    </tr>

    <?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <td><?php echo e($occupation->bien->reference); ?></td>
        <td><?php echo e($occupation->locataire->nom); ?></td>
        <td><?php echo e($occupation->date_entree); ?></td>
        <td><?php echo e($occupation->statut); ?></td>
    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

</body>
</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\rapports\occupations_pdf.blade.php ENDPATH**/ ?>