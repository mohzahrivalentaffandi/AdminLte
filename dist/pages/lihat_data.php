<?php
include('../../src/config/db.php');
$result = mysqli_query($conn, "SELECT * FROM dimsum");
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
                <h3 class="mb-0">List Produk</h3>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th> <!-- Tambahan kolom aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                            echo "<td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>";
                            echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                            echo "<td>";
                            if (!empty($row['gambar'])) {
                                echo "<img src='uploads/" . htmlspecialchars($row['gambar']) . "' width='100'>";
                            } else {
                                echo "-";
                            }
                            echo "</td>";
                            echo "<td>
                                    <a href='edit_produk.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a>
                                    <a href='hapus_produk.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                                </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>

                </table>
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
