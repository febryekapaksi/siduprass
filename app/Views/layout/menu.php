    <li class="menu-header">Menu Utama</li>
    <li>
        <a class="nav-link" href="<?= site_url('master') ?>">
            <i class="fas fa-fire"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php if (session()->get('user_role_id') == "1") { ?>

        <li>
            <a class="nav-link" href="<?= site_url('master/user') ?>">
                <i class="fas fa-users-cog"></i>
                <span>User</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= site_url('master/petugas') ?>">
                <i class="fas fa-users-cog"></i>
                <span>Petugas</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= site_url('master/warga') ?>">
                <i class="fas fa-users-cog"></i>
                <span>Warga</span>
            </a>
        </li>

    <?php } else { ?>

        <li>
            <a class="nav-link" href="<?= site_url('master/sarpras') ?>">
                <i class="fas fa-clipboard-list"></i>
                <span>Sarpras</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= site_url('master/pengaduan') ?>">
                <i class="fas fa-clipboard-list"></i>
                <span>Pengaduan</span>
            </a>
        </li>

    <?php } ?>

    <!-- <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
        <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
    </ul>
</li> -->