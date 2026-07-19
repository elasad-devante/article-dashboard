<?php if (session()->getFlashdata('sukses')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?= session()->getFlashdata('sukses') ?>',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<div>
    <div style="border-top:1px solid var(--border-soft); padding:14px 26px; font-size:11.5px; color:var(--text-muted); display:flex; justify-content:space-between; ">
        <span>Redaksi admin panel — proyek CodeIgniter</span>
        <span>v1.0</span>
    </div>
</div>