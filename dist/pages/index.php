<?php
// Harus include koneksi database
include('../../src/config/db.php');

// Ambil data dari database
// Hitung jumlah dimsum
$result_dimsum = mysqli_query($conn, "SELECT COUNT(*) as total_dimsum FROM dimsum");
$row_dimsum = mysqli_fetch_assoc($result_dimsum);
$total_dimsum = $row_dimsum['total_dimsum'];

// Hitung jumlah user
$result_users = mysqli_query($conn, "SELECT COUNT(*) as total_users FROM users");
$row_users = mysqli_fetch_assoc($result_users);
$total_users = $row_users['total_users'];

// Hitung jumlah pesanan (opsional)
$result_pesanan = mysqli_query($conn, "SELECT COUNT(*) as total_pesanan FROM pesanan");
$row_pesanan = mysqli_fetch_assoc($result_pesanan);
$total_pesanan = $row_pesanan['total_pesanan'];
?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
    <?php include('header.php'); ?>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <?php include('navbar.php'); ?>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?php include('sidebar.php'); ?>
      <!--end::Sidebar-->
       <script src="../../dist/js/adminlte.js"></script>
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard Dimsum</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <!-- Jumlah Dimsum -->
              <div class="col-lg-3 col-6">
                <div class="small-box text-bg-primary">
                  <div class="inner">
                    <h3><?php echo $total_dimsum; ?></h3>
                    <p>Total Dimsum</p>
                  </div>
                  <a href="lihat_data.php" class="small-box-footer link-light">
                    More info <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>
              <!-- Jumlah User -->
              <div class="col-lg-3 col-6">
                <div class="small-box text-bg-success">
                  <div class="inner">
                    <h3><?php echo $total_users; ?></h3>
                    <p>Total User</p>
                  </div>
                  <a href="#" class="small-box-footer link-light">
                    More info <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>
              <!-- Jumlah Pesanan -->
              <div class="col-lg-3 col-6">
                <div class="small-box text-bg-warning">
                  <div class="inner">
                    <h3><?php echo $total_pesanan; ?></h3>
                    <p>Total Pesanan</p>
                  </div>
                  <a href="pesanan.php" class="small-box-footer link-dark">
                    More info <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>
              <!-- Tambahan box jika mau -->
              <div class="col-lg-3 col-6">
                <div class="small-box text-bg-danger">
                  <div class="inner">
                    <h3>-</h3>
                    <p>Coming Soon</p>
                  </div>
                  <a href="#" class="small-box-footer link-light">
                    More info <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Dimsum Management</div>
        <strong>
          &copy; 2025 Dimsum Project. All rights reserved.
        </strong>
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
  </body>
</html>
