<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
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
            <div class="add-article-container">
                <div class="view active" id="view-form">
                    <div class="form-wrap card" style="padding:24px 26px;">
                        <form action="<?= (isset($artikel) && $artikel) ? '/add/save/' . ($artikel['slug'] ?? $artikel['id']) : '/add/save' ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="field <?= (isset($errors['judul'])) ? 'has-error' : '' ?>">
                                <label>Judul artikel</label>
                                <input type="text" name="judul" placeholder="Contoh: Panduan CRUD di CodeIgniter" value="<?= esc(old('judul', $old['judul'] ?? ($artikel['judul'] ?? ''))) ?>">
                                <?php if (isset($errors['judul'])): ?>
                                    <div class="error-text"><i class="ti ti-alert-circle"></i><?= esc($errors['judul']) ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="field <?= (isset($errors['slug'])) ? 'has-error' : '' ?>">
                                <label>Slug</label>
                                <input type="text" name="slug" placeholder="Contoh: panduan-crud-codeigniter" value="<?= esc(old('slug', $old['slug'] ?? ($artikel['slug'] ?? ''))) ?>">
                                <?php if (isset($errors['slug'])): ?>
                                    <div class="error-text"><i class="ti ti-alert-circle"></i><?= esc($errors['slug']) ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="field <?= (isset($errors['status'])) ? 'has-error' : '' ?>">
                                <label>Status</label>
                                <?php
                                $statusValue = old('status', $old['status'] ?? ($artikel['status'] ?? 'draft'));
                                ?>
                                <div class="status-pills">
                                    <select name="status" class="pill-option">
                                        <option value="draft" <?= $statusValue === 'draft' ? 'selected' : '' ?>>Draft</option>
                                        <option value="published" <?= $statusValue === 'published' ? 'selected' : '' ?>>Published</option>
                                    </select>
                                </div>
                                <?php if (isset($errors['status'])): ?>
                                    <div class="error-text"><i class="ti ti-alert-circle"></i><?= esc($errors['status']) ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="field <?= (isset($errors['konten'])) ? 'has-error' : '' ?>">
                                <label>Konten</label>
                                <textarea name="konten" placeholder="Tulis isi artikel di sini..."><?= esc(old('konten', $old['konten'] ?? ($artikel['konten'] ?? ''))) ?></textarea>
                                <?php if (isset($errors['konten'])): ?>
                                    <div class="error-text"><i class="ti ti-alert-circle"></i><?= esc($errors['konten']) ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary" onclick="showToast()">
                                    <i class="ti ti-device-floppy"></i>
                                    <?= (isset($artikel) && $artikel) ? 'Perbarui artikel' : 'Simpan artikel' ?>
                                </button>
                                <a href="/articles" class="btn btn-ghost">Batal</a>
                            </div>
                        </form>
                    </div>
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