<?php
include('../../src/config/db.php');
$result = mysqli_query($conn, "SELECT * FROM pesanan");
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
                <h3 class="mb-0">Daftar Pesanan</h3>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Produk Dimsum</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                            <th>Waktu Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_pemesan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['no_hp']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['id_dimsum']) . "</td>";
                            echo "<td>" . intval($row['jumlah']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['catatan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
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
