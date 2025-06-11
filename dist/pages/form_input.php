<?php
include('../../src/config/db.php');

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Folder upload
    $upload_dir = __DIR__ . "/uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // buat folder jika belum ada
    }

    // Proses upload file
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = $upload_dir . basename($gambar);

    if (move_uploaded_file($gambar_tmp, $gambar_path)) {
        $query = "INSERT INTO dimsum (nama, harga, deskripsi, gambar) VALUES ('$nama', '$harga', '$deskripsi', '$gambar')";
        if (mysqli_query($conn, $query)) {
            header('Location: lihat_data.php');
            exit;
        } else {
            echo "Gagal menyimpan data ke database: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal upload gambar!";
    }
}
?>

<!doctype html>
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
                <h3 class="mb-0">Tambah Produk</h3>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" step="0.01" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah Produk</button>
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
