<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('globals.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="app">
        <?= view('Layout\side_nav'); ?>
        <div class="main" style="position:relative;">
            <?= view('Layout\header'); ?>
            <div class="dashboard-container">
                <div class="view active" id="view-dashboard">
                    <div class="stat-grid">
                        <div class="card stat-card">
                            <div class="stat-label">Total artikel <i class="ti ti-notes"></i></div>
                            <div class="stat-value"><?= esc((string) ($total_artikel ?? 0)) ?></div>
                            <div class="sparkline"><i style="height:40%"></i><i style="height:55%"></i><i style="height:45%"></i><i style="height:70%"></i><i style="height:60%"></i><i style="height:85%"></i><i style="height:100%"></i></div>
                        </div>
                        <div class="card stat-card">
                            <div class="stat-label">Artikel draft <i class="ti ti-file-pencil"></i></div>
                            <div class="stat-value"><?= esc((string) ($total_draft ?? 0)) ?></div>
                            <div class="sparkline"><i style="height:80%"></i><i style="height:60%"></i><i style="height:70%"></i><i style="height:50%"></i><i style="height:55%"></i><i style="height:40%"></i><i style="height:35%"></i></div>
                        </div>
                        <div class="card stat-card">
                            <div class="stat-label">Artikel published <i class="ti ti-circle-check"></i></div>
                            <div class="stat-value"><?= esc((string) ($total_published ?? 0)) ?></div>
                            <div class="sparkline"><i style="height:30%"></i><i style="height:45%"></i><i style="height:50%"></i><i style="height:65%"></i><i style="height:75%"></i><i style="height:90%"></i><i style="height:100%"></i></div>
                        </div>
                        <div class="card stat-card">
                            <div class="stat-label">Total feedback <i class="ti ti-message-2"></i></div>
                            <div class="stat-value"><?= esc((string) ($total_feedback ?? 0)) ?></div>
                            <div class="sparkline"><i style="height:50%"></i><i style="height:40%"></i><i style="height:65%"></i><i style="height:55%"></i><i style="height:80%"></i><i style="height:70%"></i><i style="height:95%"></i></div>
                        </div>
                    </div>

                    <div class="panel-row">
                        <div class="card panel">
                            <h3>Artikel terbaru</h3>
                            <div class="sub">Perubahan terakhir pada konten</div>
                            <?php if (!empty($artikel_terbaru)): ?>
                                <?php foreach ($artikel_terbaru as $artikel): ?>
                                    <div class="mini-row">
                                        <div>
                                            <div class="mini-title"><?= esc($artikel['judul'] ?? '-') ?></div>
                                            <div class="mini-meta">Diperbarui <?= esc(date('d M Y', strtotime($artikel['updated_at'] ?? $artikel['created_at'] ?? 'now'))) ?></div>
                                        </div>
                                        <span class="badge badge-<?= esc($artikel['status'] ?? 'draft') ?>"><span class="badge-dot"></span><?= esc(ucfirst($artikel['status'] ?? 'Draft')) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="mini-row">
                                    <div>Belum ada artikel.</div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card panel">
                            <h3>Feedback masuk</h3>
                            <div class="sub">Tanggapan dari pengguna</div>
                            <?php if (!empty($feedback_terbaru)): ?>
                                <?php foreach ($feedback_terbaru as $feedback): ?>
                                    <div class="fb-row">
                                        <div class="fb-initial"><?= esc(strtoupper(substr($feedback['nama'] ?? 'F', 0, 2))) ?></div>
                                        <div>
                                            <div class="fb-name"><?= esc($feedback['nama'] ?? '-') ?></div>
                                            <div class="fb-msg"><?= esc($feedback['pesan'] ?? '-') ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="fb-row">
                                    <div>Belum ada feedback.</div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= view('Layout\footer'); ?>
        </div>
        <script src="<?= base_url('ui-script.js') ?>"></script>
</body>

</html>