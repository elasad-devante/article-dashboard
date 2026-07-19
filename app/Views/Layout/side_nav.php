<aside class="sidebar">
    <div class="brand">
        <div class="brand-mark">R</div>
        <div>
            <div class="brand-name">Redaksi</div>
            <div class="brand-sub">Admin panel artikel</div>
        </div>
    </div>

    <?php
    $pages = ['articles', 'dashboard', 'add', 'feedback'];
    $segment = service('uri')->getSegment(1);
    $activeView = '';
    if ($segment === 'articles') {
        $activeView = 'artikel';
    } elseif ($segment === 'feedback') {
        $activeView = 'feedback';
    } elseif ($segment === 'add') {
        $activeView = 'add';
    } else {
        $activeView = 'dashboard';
    }
    ?>

    <div class="nav-group-label">Menu utama</div>
    <a class="nav-item <?= $activeView === 'dashboard' ? 'active' : '' ?>" data-view="dashboard" href="/" style="text-decoration: none;">
        Dashboard

    </a>
    <a class="nav-item <?= $activeView === 'artikel' ? 'active' : '' ?>" data-view="artikel" href="/articles" style="text-decoration: none;">
        Daftar artikel
    </a>
    <a class="nav-item <?= $activeView === 'add' ? 'active' : '' ?>" data-view="form" href="/add" style="text-decoration: none;">
        Tambah / edit artikel
    </a>
    <a class="nav-item <?= $activeView === 'feedback' ? 'active' : '' ?>" data-view="feedback" href="/feedback" style="text-decoration: none;">
        Feedback
    </a>

    <div class="sidebar-footer">
        <div class="avatar">AD</div>
        <div>
            <div class="who">Admin</div>
            <div class="role">Pengelola konten</div>
        </div>
    </div>
</aside>