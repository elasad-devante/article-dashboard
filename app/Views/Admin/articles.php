<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
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
            <div class="article-mgmt">
                <div class="view active" id="view-artikel">
                    <div class="toolbar">
                        <div class="search-box" style="width:280px;"><i class="ti ti-search"></i><input id="article-search" type="text" placeholder="Cari judul artikel..." style="border:none; outline:none; background:transparent; width:100%;" /></div>
                        <a href="/add" class="btn btn-primary"><i class="ti ti-plus"></i>Tambah artikel</a>
                    </div>
                    <div class="card">
                        <table>
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th style="width:90px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="article-table-body">
                                <?php if (!empty($artikel)) : foreach ($artikel as $item) : ?>
                                        <tr class="status-rail <?= esc($item['status'] ?? 'draft') ?>" data-title="<?= esc($item['judul'] ?? '') ?>" data-slug="<?= esc($item['slug'] ?? '') ?>">
                                            <td>
                                                <div class="title-cell"><?= esc($item['judul'] ?? '-') ?></div>
                                                <div class="title-meta">Slug: <?= esc($item['slug'] ?? '-') ?></div>
                                            </td>
                                            <td><span class="badge badge-<?= esc($item['status'] ?? 'draft') ?>"><span class="badge-dot"></span><?= esc(ucfirst($item['status'] ?? 'draft')) ?></span></td>
                                            <td><?= esc(date('d M Y', strtotime($item['created_at'] ?? 'now'))) ?></td>
                                            <td>
                                                <div class="row-actions">
                                                    <a class="icon-btn" href="/add/<?= esc($item['slug'] ?? $item['id'], 'url') ?>" title="Edit artikel">
                                                        <i class="ti ti-edit"></i>
                                                        <span style="margin-left:4px; font-size:12px;">Edit</span>
                                                    </a>
                                                    <a class="icon-btn danger" href="/articles/delete/<?= esc($item['id'], 'url') ?>" title="Hapus artikel" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                                        <i class="ti ti-trash"></i>
                                                        <span style="margin-left:4px; font-size:12px;">Del</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                else : ?>
                                    <tr>
                                        <td colspan="4" style="text-align:center;">Belum ada artikel.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div id="article-pagination" style="margin-top:16px; display:flex; justify-content:flex-end; gap:8px;"></div>
                    </div>
                </div>
            </div>
            <?= view('Layout\footer'); ?>
        </div>
    </div>
    <script src="<?= base_url('ui-script.js') ?>"></script>
    <script>
        const rowsPerPage = 5;
        const tableBody = document.getElementById('article-table-body');
        const searchInput = document.getElementById('article-search');
        const pagination = document.getElementById('article-pagination');
        const allRows = Array.from(tableBody ? tableBody.querySelectorAll('tr') : []);
        let filteredRows = [...allRows];
        let currentPage = 1;

        function renderRows() {
            if (!tableBody) return;

            const term = (searchInput ? searchInput.value : '').toLowerCase().trim();
            filteredRows = allRows.filter((row) => {
                if (row.cells.length === 1) return true;
                const title = (row.getAttribute('data-title') || '').toLowerCase();
                const slug = (row.getAttribute('data-slug') || '').toLowerCase();
                return title.includes(term) || slug.includes(term);
            });

            const totalPages = Math.max(1, Math.ceil(filteredRows.length / rowsPerPage));
            currentPage = Math.min(currentPage, totalPages);

            tableBody.querySelectorAll('tr').forEach((row) => row.style.display = 'none');
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            filteredRows.slice(start, end).forEach((row) => {
                row.style.display = '';
            });

            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            if (!pagination) return;
            pagination.innerHTML = '';

            if (totalPages <= 1) return;

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'btn btn-ghost';
                button.textContent = i;
                if (i === currentPage) {
                    button.classList.add('btn-primary');
                }
                button.addEventListener('click', () => {
                    currentPage = i;
                    renderRows();
                });
                pagination.appendChild(button);
            }
        }

        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderRows();
            });
        }

        document.addEventListener('DOMContentLoaded', renderRows);
    </script>
</body>

</html>