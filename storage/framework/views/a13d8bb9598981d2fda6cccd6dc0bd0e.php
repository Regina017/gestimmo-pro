<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport des Dépenses</title>

<style>
body{font-family:DejaVu Sans;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #ddd;padding:8px;}
th{background:#f2f2f2;}
.header{text-align:center;}
</style>

</head>
<body>

<?php
$societe = \App\Models\Societe::first();
?>

<div class="header">

<?php if($societe && $societe->logo): ?>
<img src="<?php echo e(public_path('storage/'.$societe->logo)); ?>" width="90">
<?php endif; ?>

<h2><?php echo e($societe->nom); ?></h2>

</div>

<hr>

<h2>Rapport des Dépenses</h2>

<table>

<tr>
<th>Date</th>
<th>Libellé</th>
<th>Montant</th>
</tr>

<?php $__currentLoopData = $depenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<td><?php echo e($depense->created_at); ?></td>
<td><?php echo e($depense->libelle); ?></td>
<td><?php echo e(number_format($depense->montant,2)); ?> $</td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

</body>
</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\rapports\depenses_pdf.blade.php ENDPATH**/ ?>