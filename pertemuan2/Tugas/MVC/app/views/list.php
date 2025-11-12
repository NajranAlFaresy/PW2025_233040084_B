<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta nama="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Daftar Pengguna</h3>
            <a href="index.php?action=create" class="btn btn-light btn-sm">+ Tambah Pengguna</a>
        </div>
        <div class="card-body">
            <?php if (!empty($users)): ?>
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-secondary">
                    <tr class="text-center">
                        <th>Nama</th>
                        <th>Email</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['nama'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($user['email'] ?? '-'); ?></td>
                        <td class="text-center">
                            <a href="index.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="index.php?action=edit&id=<?= $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?action=delete&id=<?= $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengguna ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p class="text-center text-muted mb-0">Belum ada pengguna yang terdaftar.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
