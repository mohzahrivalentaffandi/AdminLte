<?php session_start(); ?>

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="./index.php" class="brand-link">
            <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Admin Ganteng</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Produk Menu -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-tree-fill"></i>
                        <p>
                            Produk
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="lihat_data.php" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>List Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="form_input.php" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tambah Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pesanan.php" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Pesanan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Login / Logout Menu -->
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-right"></i>
                            <p>Logout (<?= htmlspecialchars($_SESSION['username']); ?>)</p>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-in-right"></i>
                            <p>Login</p>
                        </a>
                    </li>
                <?php endif; ?>
                
            </ul>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
