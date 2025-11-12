<!DOCTYPE html>
<html>
<head>
    <title>Detail User</title>
</head>
<body>
<h2>Detail User</h2>

<?php if ($user): ?>
    <p><strong>ID:</strong> <?= $user['id'] ?></p>
    <p><strong>Nama:</strong> <?= htmlspecialchars($user['nama']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
<?php else: ?>
    <p>User tidak ditemukan.</p>
<?php endif; ?>

<a href="index.php">Kembali</a>
</body>
</html>
