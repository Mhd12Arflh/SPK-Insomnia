// Sidebar mobile toggle (admin layout)
document.addEventListener('DOMContentLoaded', function () {
    var toggleBtn = document.getElementById('sidebar-toggle');
    var sidebar = document.getElementById('sidebar');
    var overlay = document.getElementById('sidebar-overlay');

    function closeSidebar() {
        sidebar?.classList.add('-translate-x-full');
        overlay?.classList.add('hidden');
    }

    function openSidebar() {
        sidebar?.classList.remove('-translate-x-full');
        overlay?.classList.remove('hidden');
    }

    toggleBtn?.addEventListener('click', function () {
        if (sidebar?.classList.contains('-translate-x-full')) {
            openSidebar();
        } else {
            closeSidebar();
        }
    });

    overlay?.addEventListener('click', closeSidebar);

    // Profile dropdown
    var dropdownBtn = document.getElementById('profile-dropdown-btn');
    var dropdownMenu = document.getElementById('profile-dropdown-menu');

    dropdownBtn?.addEventListener('click', function (e) {
        e.stopPropagation();
        dropdownMenu?.classList.toggle('hidden');
    });

    document.addEventListener('click', function () {
        dropdownMenu?.classList.add('hidden');
    });

    // Gejala checkbox <-> select enable/disable (halaman pilih gejala)
    document.querySelectorAll('.gejala-check').forEach(function (chk) {
        chk.addEventListener('change', function () {
            var target = document.getElementById(this.dataset.target);
            var row = this.closest('[data-row]');
            if (!target) return;
            target.disabled = !this.checked;
            target.required = this.checked;
            if (!this.checked) { target.value = ''; }
            row?.classList.toggle('bg-moon-soft/40', this.checked);
        });
    });
});
