const titles = {
    dashboard: ['Dashboard', 'Ringkasan aktivitas artikel dan feedback'],
    artikel: ['Daftar artikel', 'Kelola semua artikel yang telah dibuat'],
    form: ['Tambah artikel', 'Isi detail artikel baru'],
    feedback: ['Feedback', 'Masukan dari pengguna website']
  };
  function showView(name){
    const targetView = document.getElementById('view-' + name);
    if (targetView){
      document.querySelectorAll('.view').forEach(v => v.classList.remove('active'));
      targetView.classList.add('active');
    }
    document.querySelectorAll('.nav-item').forEach(n => n.classList.toggle('active', n.dataset.view === name));
    const titleEl = document.getElementById('page-title');
    const crumbEl = document.getElementById('page-crumb');
    if (titles[name] && titleEl && crumbEl){
      titleEl.textContent = titles[name][0];
      crumbEl.textContent = titles[name][1];
    }
  }
  document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', () => showView(item.dataset.view));
  });

  function initPageTitle() {
    const path = window.location.pathname;
    let viewName = 'dashboard';

    if (path.startsWith('/articles')) {
      viewName = 'artikel';
    } else if (path.startsWith('/feedback')) {
      viewName = 'feedback';
    } else if (path.startsWith('/add')) {
      viewName = 'form';
    }
    
    showView(viewName);
  }

  document.addEventListener('DOMContentLoaded', initPageTitle);

  document.querySelectorAll('.pill-option').forEach(p => {
    p.addEventListener('click', () => {
      document.querySelectorAll('.pill-option').forEach(o => o.classList.remove('selected'));
      p.classList.add('selected');
    });
  });
  function openModal(){ document.getElementById('modal').classList.add('open'); }
  function closeModal(){ document.getElementById('modal').classList.remove('open'); }
  function showToast(text, icon){
    const t = document.getElementById('toast');
    document.getElementById('toast-text').textContent = text || 'Artikel berhasil disimpan.';
    // t.querySelector('i').className = 'ti ' + (icon || 'ti-circle-check');
    // t.classList.add('show');
    // setTimeout(() => t.classList.remove('show'), 2600);
  }