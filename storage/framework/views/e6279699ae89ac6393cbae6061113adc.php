<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport des biens</title>

<style>
body{font-family:DejaVu Sans,sans-serif;font-size:12px;}
table{width:100%;border-collapse:collapse;margin-top:20px;}
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
<p><?php echo e($societe->adresse); ?></p>

</div>

<hr>

<h2>Rapport des Biens</h2>

<table>

<tr>
<th>Référence</th>
<th>Type</th>
<th>Adresse</th>
<th>Loyer</th>
</tr>

<?php $__currentLoopData = $biens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($bien->reference); ?></td>
<td><?php echo e($bien->type); ?></td>
<td><?php echo e($bien->adresse); ?></td>
<td><?php echo e(number_format($bien->loyer,2)); ?> $</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

</body>
</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\rapports\biens_pdf.blade.php ENDPATH**/ ?>