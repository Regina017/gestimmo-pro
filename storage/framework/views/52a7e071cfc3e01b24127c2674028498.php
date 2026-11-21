<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport de Caisse</title>

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

<h2>Rapport de Caisse</h2>

<table>

<tr>
<th>Revenus</th>
<td><?php echo e(number_format($revenus,2)); ?> $</td>
</tr>

<tr>
<th>Dépenses</th>
<td><?php echo e(number_format($depenses,2)); ?> $</td>
</tr>

<tr>
<th>Solde</th>
<td><?php echo e(number_format($revenus - $depenses,2)); ?> $</td>
</tr>

</table>

</body>
</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\rapports\caisse_pdf.blade.php ENDPATH**/ ?>