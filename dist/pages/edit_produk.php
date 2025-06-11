<?php
include('../../src/config/db.php');

// Ambil data produk berdasarkan ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM dimsum WHERE id = $id");
    $produk = mysqli_fetch_assoc($result);
    
    if (!$produk) {
        echo "Produk tidak ditemukan.";
        exit;
    }
} else {
    echo "ID produk tidak diberikan.";
    exit;
}

// Proses update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = floatval($_POST['harga']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Proses upload gambar jika diubah
    if ($_FILES['gambar']['name']) {
        $gambar_name = basename($_FILES['gambar']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $gambar_name;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file);
    } else {
        $gambar_name = $produk['gambar']; // pakai gambar lama
    }

    // Update data ke database
    $query = "UPDATE dimsum SET 
                nama = '$nama', 
                harga = '$harga', 
                deskripsi = '$deskripsi',
                gambar = '$gambar_name'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: lihat_data.php");
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    <?php include('navbar.php'); ?>
    <?php include('sidebar.php'); ?>
    <script src="../../dist/js/adminlte.js"></script>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h3 class="mb-0">Edit Produk</h3>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($produk['nama']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= htmlspecialchars($produk['harga']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= htmlspecialchars($produk['deskripsi']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label><br>
                        <?php if (!empty($produk['gambar'])): ?>
                            <img src="uploads/<?= htmlspecialchars($produk['gambar']) ?>" width="120"><br>
                        <?php else: ?>
                            <em>Tidak ada gambar</em><br>
                        <?php endif; ?>
                        <label for="gambar" class="form-label">Ganti Gambar (opsional)</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                    <a href="lihat_data.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </main>

    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Dimsum Management</div>
        <strong>&copy; 2025 Dimsum Project. All rights reserved.</strong>
    </footer>
</div>
</body>
</html>
