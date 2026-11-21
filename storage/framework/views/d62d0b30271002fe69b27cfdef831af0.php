<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport des Paiements</title>

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

<h2>Rapport des Paiements</h2>

<table>

<tr>
<th>Date</th>
<th>Montant</th>
<th>Mode</th>
</tr>

<?php $__currentLoopData = $paiements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<td><?php echo e($paiement->date_paiement); ?></td>
<td><?php echo e(number_format($paiement->montant,2)); ?> $</td>
<td><?php echo e($paiement->mode_paiement); ?></td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

</body>
</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\rapports\paiements_pdf.blade.php ENDPATH**/ ?>