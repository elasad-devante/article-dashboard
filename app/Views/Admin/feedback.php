<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reader Feedback</title>
    <link rel="stylesheet" href="<?= base_url('globals.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="app">
        <?= view('Layout\side_nav'); ?>
        <div class="main">
            <?= view('Layout\header'); ?>
            <div style="margin: 25px;">
                <div class="view active" id="view-feedback">
                    <div class="panel-row" style="grid-template-columns:1fr 1.3fr;">
                        <div class="card panel">
                            <h3>Form feedback</h3>
                            <div class="sub">Masukkan pendapat Anda untuk membantu pengembangan.</div>

                            <?php if (session()->getFlashdata('sukses')): ?>
                                <div class="success-text" style="margin-bottom: 12px;">
                                    <?= esc(session()->getFlashdata('sukses')) ?>
                                </div>
                            <?php endif; ?>

                            <form action="/feedback/store" method="post">
                                <?= csrf_field() ?>
                                <div class="field <?= isset($errors['nama']) ? 'has-error' : '' ?>">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="<?= esc(old('nama', $old['nama'] ?? '')) ?>" placeholder="Masukkan nama Anda">
                                    <?php if (isset($errors['nama'])): ?>
                                        <div class="error-text"><i class="ti ti-alert-circle"></i><?= esc($errors['nama']) ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="field <?= isset($errors['email']) ? 'has-error' : '' ?>">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?= esc(old('email', $old['email'] ?? '')) ?>" placeholder="nama@email.com">
                                    <?php if (isset($errors['email'])): ?>
                                        <div class="error-text"><i class="ti ti-alert-circle"></i><?= esc($errors['email']) ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="field <?= isset($errors['pesan']) ? 'has-error' : '' ?>">
                                    <label>Pesan</label>
                                    <textarea name="pesan" style="min-height:80px;" placeholder="Tulis masukan Anda..."><?= esc(old('pesan', $old['pesan'] ?? '')) ?></textarea>
                                    <?php if (isset($errors['pesan'])): ?>
                                        <div class="error-text"><i class="ti ti-alert-circle"></i><?= esc($errors['pesan']) ?></div>
                                    <?php endif; ?>
                                </div>
                                <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center;"><i class="ti ti-send"></i>Kirim feedback</button>
                            </form>
                        </div>

                        <div class="card">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($feedbacks)): ?>
                                        <?php foreach ($feedbacks as $item): ?>
                                            <tr>
                                                <td class="title-cell"><?= esc($item['nama'] ?? '-') ?></td>
                                                <td><?= esc($item['email'] ?? '-') ?></td>
                                                <td class="fb-msg-full"><?= esc($item['pesan'] ?? '-') ?></td>
                                                <td><?= esc(date('d M Y', strtotime($item['created_at'] ?? 'now'))) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" style="text-align:center;">Belum ada feedback.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?= view('Layout\footer'); ?>
        </div>
    </div>
    <script src="<?= base_url('ui-script.js') ?>"></script>
</body>

</html>