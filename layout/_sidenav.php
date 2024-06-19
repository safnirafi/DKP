

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">
        Dapur Kopi Pasundan
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.php">DKP</a>
    </div>
    <ul class="sidebar-menu">
      <?php if ($_SESSION['login']['role'] === 'admin'): ?>
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="../dashboard/"><i class="fas fa-fire"></i> <span>Home</span></a></li>
      <li class="menu-header">Main Feature</li>
      <li><a class="nav-link" href="../user/index.php"><i class="fas fa-columns"></i> <span>Pelanggan</span></a></li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Menu</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../menu/index.php">List</a></li>
          <li><a class="nav-link" href="../menu/create.php">Tambah Data</a></li>
        </ul>
      </li>
      <li><a class="nav-link" href="../reservasi/index.php"><i class="fas fa-columns"></i> <span>Reservasi</span></a></li>
      <?php else: ?>
      <li class="menu-header">Main Feature</li>
      <li><a class="nav-link" href="../matakuliah/index.php"><i class="fas fa-columns"></i> <span>Reservasi</span></a></li>
      <?php endif; ?>
    </ul>
  </aside>
</div>