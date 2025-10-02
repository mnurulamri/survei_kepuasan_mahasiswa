<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Menu untuk Admin -->
                <?php if ($this->session->userdata('role') == 'admin'): ?>
                    <li class="nav-item">
                        <a href="admin/manage_users" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/manage_survei" class="nav-link">
                            <i class="nav-icon fas fa-poll"></i>
                            <p>Manage Surveys</p>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Menu untuk Pengguna -->
                <?php if ($this->session->userdata('role') == 'user'): ?>
                    <li class="nav-item">
                        <a href="user/survei" class="nav-link">
                            <i class="nav-icon fas fa-poll"></i>
                            <p>Isi Survey</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>