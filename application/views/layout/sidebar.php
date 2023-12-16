<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">Manajemen Catatan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">MC</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href=" <?= base_url('dashboard') ?> "><i class="fas fa-fire"></i> <span> Beranda </span></a></li>
                <li><a class="nav-link" href=" <?= base_url('dashboard/tambahcatatan') ?> "><i class="fas fa-book"></i> <span>Buat Catatan </span></a></li>
                <li><a class="nav-link" href=" <?= base_url('dashboard/edit_catatan') ?> "><i class="fas fa-edit"></i> <span>Edit Catatan </span></a></li>
            </ul>
        </aside>
      </div>