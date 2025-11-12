<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pengguna</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Edit Data Pengguna</h4>
      </div>
      <div class="card-body">

        <!-- Form Edit -->
        <form action="index.php?action=edit&id=<?= htmlspecialchars($user['id']); ?>" method="POST">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input 
              type="text" 
              class="form-control" 
              id="nama" 
              name="nama" 
              value="<?= htmlspecialchars($user['nama'] ?? ''); ?>" 
              required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
              type="email" 
              class="form-control" 
              id="email" 
              name="email" 
              value="<?= htmlspecialchars($user['email'] ?? ''); ?>" 
              required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password (Opsional)</label>
            <input 
              type="password" 
              class="form-control" 
              id="password" 
              name="password" 
              placeholder="Isi jika ingin mengganti password">
          </div>

          <button type="submit" class="btn btn-success">Simpan Perubahan</button>
          <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>

      </div>
    </div>
  </div>
</body>
</html>
